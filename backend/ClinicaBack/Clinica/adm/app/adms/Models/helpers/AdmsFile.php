<<<<<<< Updated upstream
<?php

namespace Adms\Models\helpers;

/**     class AdmsFile 
 * Essa classe contem function responsaveis por verificar o
 *      arquivo encaminhado pelo cliente, além de functions 
 *      responsavel por salvar o arquivo na pasta de imagens 
 */
class AdmsFile
{

    /**     function verifyFile($formFile)
     * O arquivo que o cliente insere no formulario é avaliado as seguintes informações
     *      - se o arquivo é maior que 2 mg: 
     *      - se é diferente de .pdf ou .png
     *      - se teve falha ao carregar arquivo
     */
    public function verifyFile($formFile): bool
    {
        $file = $formFile; // arquivo passado pelo cliente

        if ($file['error']) // falha ao carregar arquivo
        {
            $_SESSION['errFile'] = "Erro ao receber imagem";
            return false;
        }

        elseif ($file['size'] > 2097152) // arquivo maior que 2 mg
        { 
            $_SESSION['errFile'] = "Arquivo muito grande";
            return false;
        } 

        else // arquivo recebido
        {
            // pega o tipo do arquivo (.pdf, .png ...)
            $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != "png") { // se não for um arquivo jpg ou png
                $_SESSION['errFile'] = "tipo de arquivo não aceito";
                return false;
            } else {
                return true; //$this->saveFile($extensao)
            }
        }
    }



    /**     function saveFile($formFile)
     * Salva o arquivo na pasta de imagens 
     * Se conseguir salvar retorna o nome do arquivo dentro da pasta 
     * Se não conseguir salvar retorna NULL
     */
    public function saveFile($formFile): string|null
    {
        $extensao = strtolower(pathinfo($formFile['name'], PATHINFO_EXTENSION));
        $pasta = IMGADMSER; 
        $nomeUnicoArquivo = uniqid(); // nome aleatorio de arquivo, mas sempre unico
        $path = $pasta . $nomeUnicoArquivo . "." . $extensao;
        $nameInDB = $nomeUnicoArquivo . "." . $extensao;

        $save = move_uploaded_file($formFile['tmp_name'], $path); // salvar o arquivo na pasta
        if($save){ // se salvar corretamente 
            return $nameInDB;
        }
        else { // se tiver algum erro no save
            return null;
        }
        
    }

=======
<?php

namespace Adms\Models\helpers;

/**     class AdmsFile 
 * Essa classe contem function responsaveis por verificar o
 *      arquivo encaminhado pelo cliente, além de functions 
 *      responsavel por salvar o arquivo na pasta de imagens 
 */
class AdmsFile
{

    /**     function verifyFile($formFile)
     * O arquivo que o cliente insere no formulario é avaliado as seguintes informações
     *      - se o arquivo é maior que 2 mg: 
     *      - se é diferente de .pdf ou .png
     *      - se teve falha ao carregar arquivo
     */
    public function verifyFile($formFile): bool
    {
        $file = $formFile; // arquivo passado pelo cliente

        if ($file['error']) // falha ao carregar arquivo
        {
            $_SESSION['errFile'] = "Erro ao receber imagem";
            return false;
        }

        elseif ($file['size'] > 2097152) // arquivo maior que 2 mg
        { 
            $_SESSION['errFile'] = "Arquivo muito grande";
            return false;
        } 

        else // arquivo recebido
        {
            // pega o tipo do arquivo (.pdf, .png ...)
            $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != "png") { // se não for um arquivo jpg ou png
                $_SESSION['errFile'] = "tipo de arquivo não aceito";
                return false;
            } else {
                return true; //$this->saveFile($extensao)
            }
        }
    }



    /**     function saveFile($formFile)
     * Salva o arquivo na pasta de imagens 
     * Se conseguir salvar retorna o nome do arquivo dentro da pasta 
     * Se não conseguir salvar retorna NULL
     */
    public function saveFile($formFile): string|null
    {
        $extensao = strtolower(pathinfo($formFile['name'], PATHINFO_EXTENSION));
        $pasta = IMGADMSER; 
        $nomeUnicoArquivo = uniqid(); // nome aleatorio de arquivo, mas sempre unico
        $path = $pasta . $nomeUnicoArquivo . "." . $extensao;
        $nameInDB = $nomeUnicoArquivo . "." . $extensao;

        $save = move_uploaded_file($formFile['tmp_name'], $path); // salvar o arquivo na pasta
        if($save){ // se salvar corretamente 
            return $nameInDB;
        }
        else { // se tiver algum erro no save
            return null;
        }
        
    }

>>>>>>> Stashed changes
}