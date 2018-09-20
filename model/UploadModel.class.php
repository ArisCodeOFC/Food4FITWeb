<?php
    abstract class UploadModel {
        public $uploadData;

        public function startUpload($path) {
            if ($this->uploadData) {
                $data = $this->uploadData->fileData;
                if (preg_match("/^data:image\/(\w+);base64,/", $data, $extensao)) {
                    $data = substr($data, strpos($data, ",") + 1);
                    $extensao = strtolower($extensao[1]);

                    if (!in_array($extensao, ["jpg", "jpeg", "png"])) {
                        throw new Exception("Extensão do arquivo não suportada");
                    }

                    $data = base64_decode($data);
                    if ($data === false) {
                        throw new Exception("Não foi possível decodificar os dados do arquivo");
                    }

                    $nomeCriptografado = md5($this->uploadData->fileName . uniqid()) . "." . $extensao;
                    $caminhoArquivo = $path . "/" . $nomeCriptografado;
                    if (!@file_put_contents($caminhoArquivo, $data)) {
                        throw new Exception("Não foi possível concluir o upload do arquivo");
                    }

                    $this->foto = $caminhoArquivo;

                } else {
                    throw new Exception("URI do arquivo incorreto");
                }

                $this->uploadData = null;
            }
        }
    }
?>
