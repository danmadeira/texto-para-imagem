## Texto para Imagem

Script em PHP com funções para conversão de um texto puro ASCII para pontos RGB em uma imagem PNG, e o processo inverso, para recuperação do texto que está embutido na imagem.

### Como é feito:

Os caracteres do texto tem seu valor decimal, em código ASCII, alocado para cada um dos valores da cor RGB que compõe um pixel na imagem. Cada pixel comporta até três caracteres. No processo inverso, cada pixel da imagem é lido e os valores RGB são realocados para caracteres em código ASCII.

### Exemplo:

A imagem abaixo:

![Texto em RGB](img/texto.png?raw=true)

Contém todo este texto:

```
Esta questão que aparenta ser simples, é bastante complexa para responder. É uma questão que na história muitos cientistas já refletiram sobre, incluindo Johannes Kepler, Edmond Halley e o astro-físico alemão Heinrich Wilhelm Olbers. Há duas coisas para se pensar sobre isto. Primeiramente, por que o céu durante o dia é azul? Esta questão é simples de ser respondida. O céu durante o dia é azul porque a luz do Sol, que está relativamente próximo à Terra, colide com as moléculas da atmosfera terrestre e dispersa-se em todas as direções. A cor azul é um resultado deste processo de dispersão. À noite, quando a parte da Terra está voltada para o lado oposto ao Sol, o espaço se mostra escuro porque não há uma fonte de luz próxima, como o Sol, para dispersar-se. Se estivéssemos na Lua, onde não há atmosfera, o céu apareceria escuro tanto à noite quanto de dia. Agora a parte difícil. Se o universo é repleto de estrelas, por que as luzes de todas as estrelas não se somam para fazer todo o céu brilhar constantemente? Esta dúvida existe pois o universo é infinitamente largo e infinitamente velho, então supõe-se que o céu noturno deveria ser brilhante pela luz de todas as estrelas. Em qualquer direção no espaço que se olhe veremos muitas estrelas. Mesmo assim temos a verificação de um espaço escuro. Este paradoxo é conhecido como Paradoxo de Olbers. É um paradoxo por causa desta contradição entre nossa expectativa de um céu brilhante à noite e nossa verificação de que o céu é escuro. Muitas explicações já foram postas para tentar resolver o Paradoxo de Olbers. A melhor solução até o presente é que o universo não é infinitamente velho, possui aproximadamente 15 bilhões de anos de existência. O que significa que só vemos objetos tão distantes quanto a distância percorrida pela luz em 15 bilhões de anos. As luzes das estrelas além desta distância ainda não tiveram tempo para chegar até nós e então não podem contribuir para fazer o céu brilhar. Outra razão do céu não ser brilhante com as luzes de todas as estrelas é porque quando uma fonte de luz está se movendo para longe de nós, o comprimento da onda de luz se torna alongado. Isto significa que as ondas de luz das estrelas que estão se afastando de nós tornam-se desviadas para o vermelho, e podem ter se desviado tanto que não estão mais visíveis. O efeito Doppler também se verifica com as ondas de luz.
```
