<?php
    session_start();

    // 1. Conexão e Seleção do Banco
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    // 2. Define o cabeçalho para retornar JSON (essencial para o fetch())
    header('Content-Type: application/json');

    // --- Recebendo e verificando dados ---
    $emailUsuario = $_SESSION['emailUsuario'];
    
    // ATENÇÃO: Verifique se os dados POST estão definidos antes de usá-los!
    $idProduto = $_POST["idProduto"] ?? NULL;
    // O valor de 'qtdProdutos' vem do input e precisa ser numérico
    $qtdProdutosRecebidos = (int)($_POST["qtdProdutos"] ?? 0); 

    // Se o produto ou a quantidade não vierem, retorna erro
    if (!$idProduto || $qtdProdutosRecebidos <= 0) {
        mysqli_close($connect);
        echo json_encode(['success' => false, 'message' => 'Dados de produto inválidos.']);
        exit;
    }

    // --- Busca o ID do Usuário ---
    $query_select_user = "SELECT idUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
    $select_user = mysqli_query($connect, $query_select_user);
    $array_user = mysqli_fetch_array($select_user);
    $idUsuario = $array_user["idUsuario"];
    
    // --- Busca Pedido ABERTO Existente ---
    $query_select_pedido = "SELECT idPedido, qtdProduto FROM pedido WHERE idUsuario = '$idUsuario' AND idProduto = '$idProduto' AND dataPedido IS NULL";
    $select_pedido = mysqli_query($connect, $query_select_pedido);
    $array_pedido = mysqli_fetch_array($select_pedido);
    
    $idPedido = $array_pedido["idPedido"] ?? NULL;

    // --- Lógica de Ação ---
    $sucesso_db = false; // Flag para rastrear o sucesso da operação

    if($idPedido != NULL){
        // PRODUTO JÁ EXISTE NO CARRINHO: ATUALIZA A QUANTIDADE
        $qtdProdutoAtualizada = $array_pedido["qtdProduto"] + $qtdProdutosRecebidos;
        
        $query_update = "UPDATE pedido SET qtdProduto = '$qtdProdutoAtualizada' WHERE idPedido = '$idPedido'";
        $update = mysqli_query($connect, $query_update);
        
        if ($update) {
            $sucesso_db = true;
        }
        $mensagem = "Produto atualizado no carrinho!";

    } else {
        // PRODUTO NÃO EXISTE NO CARRINHO: INSERE NOVO REGISTRO
        $query_insert = "INSERT INTO pedido(idUsuario, idProduto, dataPedido, qtdProduto) VALUES('$idUsuario', '$idProduto', NULL, '$qtdProdutosRecebidos')";
        $insert = mysqli_query($connect, $query_insert);
        
        if ($insert) {
            $sucesso_db = true;
        }
        $mensagem = "Produto adicionado ao carrinho!";
    }
    
    mysqli_close($connect);

    // --- Retorno JSON para o JavaScript ---
    if ($sucesso_db) {
        echo json_encode(['success' => true, 'message' => $mensagem]);
    } else {
        // Se houve erro no INSERT/UPDATE, informa ao JS
        echo json_encode(['success' => false, 'message' => 'Erro no banco de dados.']);
    }
    exit;
?>