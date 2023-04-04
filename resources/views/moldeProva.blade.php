<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Título Opcional</title>

        <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
    </head>
    <body>



<h1>Centro Universitario Campos de Andrade</h1>
<h2>Turma: <?= $perguntas[0]->descricao?></h2>
<h2>Data: <?= $perguntas[0]->dataProva?></h2>
<h2>Nome: _________________________________________</h2>
<ul>
            @foreach($perguntas as $key => $pergunta)



            <div id="campoPergunta">
                Questão <?= $key+1 ?>: <textarea rows = "5" cols = "60" name = "pergunta" id="texto_pergunta">
                <?= $pergunta->texto_pergunta?>
             </textarea>
            </div>
            <div>
                <div id="campoRespostaA">
                    <input type="radio" name="radio" id="radioA" onchange="a()"  > A) <?= $pergunta->texto_resposta_a?>

                </div>
                <div id="campoRespostaB">
                    <input type="radio" name="radio" id="radioB" onchange="b()"  > B) <?= $pergunta->texto_resposta_b?>

                </div>
                <div id="campoRespostaC">
                    <input type="radio" name="radio" id="radioC" onchange="c()" > C) <?= $pergunta->texto_resposta_c?>

                </div>
                <div id="campoRespostaD">
                    <input type="radio" name="radio" id="radioD" onchange="d()" > D) <?= $pergunta->texto_resposta_d?>

                <div id="campoRespostaE">
                    <input type="radio" name="radio" id="radioE" onchange="e()" > E) <?= $pergunta->texto_resposta_e?>

                </div>
            </div>







            @endforeach
        </ul>



    </body>
</html>
