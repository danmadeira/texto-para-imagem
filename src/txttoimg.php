<?php

/*
 * Funções para conversão de um texto puro ASCII para pontos RGB em uma imagem PNG.
 * E vice-versa, recupera o texto da imagem.
 */

function gerarCores($texto)
{
    $cores = array();
    $r = $g = $b = 0;
    $tam = strlen($texto);
    for ($i = 0; $i < $tam; $i++) {
        $valor = ord($texto[$i]);
        if ($r == 0) {
            $r = $valor;
        } elseif ($g == 0) {
            $g = $valor;
        } else {
            $b = $valor;
        }
        if (($r > 0 and $g > 0 and $b > 0) or ($i == $tam-1)) {
            $cores[] = array('red' => $r, 'green' => $g, 'blue' => $b);
            $r = $g = $b = 0;
        }
    }
    return $cores;
}

function gerarDimensao($pontos)
{
    $dimensao['largura'] = ceil(sqrt($pontos * 1.333333));
    $dimensao['altura'] = ceil($pontos / $dimensao['largura']);
    return $dimensao;
}

function txttoimg($texto)
{
    $cores = gerarCores($texto);
    $dimensao = gerarDimensao(count($cores));
    $imagem = imagecreatetruecolor($dimensao['largura'], $dimensao['altura']);
    $i = 0;
    $fim = false;
    for ($y = 0; $y < $dimensao['altura']; $y++) {
        for ($x = 0; $x < $dimensao['largura']; $x++) {
            if (isset($cores[$i])) {
                $cor = imagecolorallocate($imagem, $cores[$i]['red'], $cores[$i]['green'], $cores[$i]['blue']);
            } elseif (!$fim) {
                $cor = imagecolorallocate($imagem, 0, rand(44, 165), rand(44, 165));
                $fim = true;
            } else {
                $cor = imagecolorallocate($imagem, rand(44, 165), rand(44, 165), rand(44, 165));
            }
            imagesetpixel($imagem, $x, $y, $cor);
            $i++;
        }
    }
    return $imagem;
}

function imgtotxt($imagem)
{
    $largura = imagesx($imagem);
    $altura = imagesy($imagem);
    $texto = '';
    for ($y = 0; $y < $altura; $y++) {
        for ($x = 0; $x < $largura; $x++) {
            $cores = imagecolorsforindex($imagem, imagecolorat($imagem, $x, $y));
            if ($cores['red'] > 0) {
                $texto .= chr($cores['red']);
                $texto .= ($cores['green'] > 0) ? chr($cores['green']) : '';
                $texto .= ($cores['blue'] > 0) ? chr($cores['blue']) : '';
            } else {
                break 2;
            }
        }
    }
    return $texto;
}

/*
 * Daqui pra baixo é somente exemplo de execução das funções acima.
 */
 
$texto = 'Esta questão que aparenta ser simples, é bastante complexa para responder. É uma questão que na história muitos cientistas já refletiram sobre, incluindo Johannes Kepler, Edmond Halley e o astro-físico alemão Heinrich Wilhelm Olbers. Há duas coisas para se pensar sobre isto. Primeiramente, por que o céu durante o dia é azul? Esta questão é simples de ser respondida. O céu durante o dia é azul porque a luz do Sol, que está relativamente próximo à Terra, colide com as moléculas da atmosfera terrestre e dispersa-se em todas as direções. A cor azul é um resultado deste processo de dispersão. À noite, quando a parte da Terra está voltada para o lado oposto ao Sol, o espaço se mostra escuro porque não há uma fonte de luz próxima, como o Sol, para dispersar-se. Se estivéssemos na Lua, onde não há atmosfera, o céu apareceria escuro tanto à noite quanto de dia. Agora a parte difícil. Se o universo é repleto de estrelas, por que as luzes de todas as estrelas não se somam para fazer todo o céu brilhar constantemente? Esta dúvida existe pois o universo é infinitamente largo e infinitamente velho, então supõe-se que o céu noturno deveria ser brilhante pela luz de todas as estrelas. Em qualquer direção no espaço que se olhe veremos muitas estrelas. Mesmo assim temos a verificação de um espaço escuro. Este paradoxo é conhecido como Paradoxo de Olbers. É um paradoxo por causa desta contradição entre nossa expectativa de um céu brilhante à noite e nossa verificação de que o céu é escuro. Muitas explicações já foram postas para tentar resolver o Paradoxo de Olbers. A melhor solução até o presente é que o universo não é infinitamente velho, possui aproximadamente 15 bilhões de anos de existência. O que significa que só vemos objetos tão distantes quanto a distância percorrida pela luz em 15 bilhões de anos. As luzes das estrelas além desta distância ainda não tiveram tempo para chegar até nós e então não podem contribuir para fazer o céu brilhar. Outra razão do céu não ser brilhante com as luzes de todas as estrelas é porque quando uma fonte de luz está se movendo para longe de nós, o comprimento da onda de luz se torna alongado. Isto significa que as ondas de luz das estrelas que estão se afastando de nós tornam-se desviadas para o vermelho, e podem ter se desviado tanto que não estão mais visíveis. O efeito Doppler também se verifica com as ondas de luz.';

/*
 * Converte a string para uma imagem...
 */
$imagem = txttoimg($texto);

/*
 * ou, converte a imagem para uma string.
 */
$txt = imgtotxt($imagem);

/*
 * Testando as saídas.
 */
header("Content-Type: image/png");
header('Content-Disposition: inline; filename="texto.png"');
imagepng($imagem);
imagedestroy($imagem);

// echo "<!DOCTYPE html><p>$txt</p>";
