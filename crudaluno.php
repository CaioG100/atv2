<?php

    require_once 'conexao.php';

    function create($aluno)
    {
        try {
            $con = getConnection();
            $stmt = $con->prepare("INSERT INTO aluno (nome, email, cpf) VALUES (:nome, :email, :cpf)");
            $stmt->bindParam(":nome", $aluno->nome);
            $stmt->bindParam(":email", $aluno->email);
            $stmt->bindParam(":cpf", $aluno->cpf);
            if ($stmt->execute())
                echo "aluno cadastrado";
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }
    $aluno = new stdClass(); 
    $aluno->nome = "Doidano";
    $aluno->email = "doid@senac.com.br"; 
    $aluno->cpf = "55555555555";
    create($aluno);
    function get()
    {
        try {
            $con = getConnection();
            $rs = $con->query("SELECT nome, email, cpf FROM aluno");
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo $row->nome . "<br>";
                echo $row->email . "<br>";
                echo $row->cpf . "<br>---<br>";
            }
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($rs);
        }
    }
    get();
    function find($nome)
    {
        try {
            $con = getConnection();
            $stmt = $con->prepare("SELECT nome, email, cpf FROM aluno WHERE nome LIKE :nome");
            $stmt->bindValue(":nome", "%{$nome}%");
            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo $row->nome. "<br>";
                        echo $row->email . "<br>";
                        echo $row->cpf . "<br>___<br>";
                    }
                }
            }
        } catch (PDOException $error) {
            echo "erro '{$nome}'. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }
    find("Doidano");
    function update($aluno)
    {
        try {
            $con = getConnection();
            $stmt = $con->prepare("UPDATE aluno SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id");
            $stmt->bindParam(":id", $aluno->id);
            $stmt->bindParam(":nome", $aluno->nome);
            $stmt->bindParam(":email", $aluno->email);
            $stmt->bindParam(":cpf", $aluno->cpf);
            if ($stmt->execute())
                echo "<br>____<br> dados atualizados <br>____<br>";
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }
    $aluno = new stdClass();
    $aluno->id = 6;
    $aluno->nome = "Lucano";
    $aluno->email = "luc@senac.com.br";
    $aluno->cpf = "66666666666";
    update($aluno);
    find("Lucano");
    function delete($id)
    {
        try {
            $con = getConnection();
            $stmt = $con->prepare("DELETE FROM aluno WHERE id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute())
                echo "dados deletados";
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }
    delete(6);
    echo "<br>____<br>";
    get();
    function getView()
    {
        try {
            $con = getConnection();
            $rs = $con->query("SELECT * FROM consulta_aluno");
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo $row->CPF . "<br>";
                echo $row->Nome . "<br>";
                echo $row->Email . "<br>____<br>";
            }
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($rs);
        }
    }
    getView();
