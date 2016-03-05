<?php
error_reporting(E_ERROR | E_PARSE);
$subjectPrefix = '[Contato via Site]';
$emailTo = 'claudioromano13@gmail.com';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $subject = stripslashes(trim($_POST['form-assunto']));
    $message = stripslashes(trim($_POST['form-mensagem']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Nome: $name <br /> Email: $email  <br /> Mensagem: $message";
        $headers .= sprintf( 'Return-Path: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'From: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Reply-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
        $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
        $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
        $headers .= sprintf( 'Disposition-Notification-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
        $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
        $headers .= sprintf( 'Content-Type: text/html; charset="utf-8"%s', PHP_EOL );
        mail($emailTo, "claudioromano13@gmail.com".base64_encode($subject)."?=", $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Criação e Desenvolvimento de Websites" />

        <title>Romano Dev</title>

        <link rel="icon" href="prod/images/ico.ico" type="image/x-icon" />
        <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="all" />
        <link href="prod/css/styles.css" rel="stylesheet">

        <script src="prod/js/jquery-1.11.1.min.js"></script>
        <script src="prod/js/jquery.bxslider.js"></script>
        <script src="prod/js/scripts.js"></script>
        <script src="prod/js/materialize.js"></script>

    </head>

    <body id="begin">
        <nav id="menu-principal" class="navbar-default navbar-fixed">
            <div class="nav-wrapper">
                <a href="#inicio" class="brand-logo logo">Romano Dev</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light" href="#inicio">Início</a></li>
                    <li><a href="#oquefazemos" class="waves-effect waves-light">O Que Faço</a></li>
                    <li><a href="#quemsou" class="waves-effect waves-light">Quem Sou</a></li>
                    <li><a href="portfolio.html" class="waves-effect waves-light">Portfolio</a></li>
                    <li><a href="#clientes" class="waves-effect waves-light">Clientes</a></li>
                    <li><a href="#contact-form" class="waves-effect waves-light">Contato</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a class="waves-effect waves-light" href="#inicio">Início</a></li>
                    <li><a href="#oquefazemos" class="waves-effect waves-light">O Que Faço</a></li>
                    <li><a href="#quemsou" class="waves-effect waves-light">Quem Sou</a></li>
                    <li><a href="portfolio.html" class="waves-effect waves-light">Portfolio</a></li>
                    <li><a href="#clientes" class="waves-effect waves-light">Clientes</a></li>
                    <li><a href="#contact-form" class="waves-effect waves-light">Contato</a></li>
                </ul>
            </div>
        </nav>

        <div class="modal-alert">
            <?php if(!empty($emailSent)): ?>    
                <div class="alert alert-success">
                    <!-- <div class="close"><i class="fa fa-times"></i></div> -->
                    <div class="circle z-depth-2"><img src="prod/images/perfil.jpg" alt="claudio romano" /></div>
                    <p>Sua mensagem foi enviada com sucesso.</p>
                </div>  
                <div class="bg-alert"></div>
            <?php else: ?>
            <?php if(!empty($hasError)): ?>
                <div class="alert alert-danger">
                    <div class="close"><i class="fa fa-times"></i></div>
                    <div class="circle z-depth-2"><img src="prod/images/perfil.jpg" alt="claudio romano" /></div>
                    <p>Erro no envio, tente novamente mais tarde.</p></div>
                </div>
                    <div class="bg-alert"></div>
            <?php endif; ?>
            <?php endif; ?>
        </div>

        <section id="inicio">
            <div class="title">
                <h1><span class="azul">W</span>eb Developer & <span class="vermelho">W</span>eb Designer</h1>
                <p>Design e Desenvolvimento Front-End</p>
            </div>   
            <div class="bg"><img src="prod/images/blue.jpg" alt="chamada" /></div>
        </section>

        <section id="skills">
            <div id="oquefazemos"></div>
            <div class="container box">
                <h2 class="center fontwhite sombra">O Que Faço</h2>
                <h3 class="center fontwhite sombra">Solução completa para seu projeto.</h3>
                <div class="row whatdo">
                    <div class="col s4 center">
                        <i class="fa fa-file-text-o fa-4x"></i>
                        <h3>Arquitetura da Informação</h3>
                        <ul>
                            <li>Planejamento</li>
                            <li>Wireframe</li>
                        </ul>
                    </div>
                    <div class="col s4 center">
                        <i class="fa fa-paint-brush fa-4x"></i>
                        <h3>Design</h3>
                        <ul>
                            <li>Layout exclusivo</li>
                            <li>Experiência do usuário</li>
                        </ul>
                    </div>
                    <div class="col s4 center">
                        <i class="fa fa-code fa-4x"></i>
                        <h3>Desenvolvimento</h3>
                        <ul>
                            <li>Layout Responsivo</li>
                            <li>Code otimizado e performático</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="process">
            <ul class="processo">
                <li>
                    <div class="limiter">
                        <h3><i class="fa fa-code"></i> Desenvolvimento</h3>
                        <p>Programação responsiva com foco em performance</p>
                    </div>
                </li>
                
                <li>
                    <div class="limiter">
                        <h3><i class="fa fa-paint-brush"></i> Design</h3>
                        <p>Criação de layout exclusivo</p>
                    </div>
                </li>
                <li>
                    <div class="limiter">
                        <h3><i class="fa fa-file-text-o"></i> Planejamento</h3>
                        <p>Levantamento das necessidades, prazos e orçamento</p>
                    </div>
                </li>
                <li>
                    <div class="limiter">
                        <h3><i class="fa fa-file-text-o"></i> Arquitetura da Informação</h3>
                        <p>Criação de wireframe (protótipo navegável)</p>
                    </div>
                </li>
            </ul>
        </section>

        <section id="who">
            <div id="quemsou"></div>
            <div class="container box">
                <div class="row">
                    <div class="col s12 m4 l2 perfil">
                        <div class="circle z-depth-2"><img src="prod/images/perfil.jpg" alt="claudio romano" /></div>
                    </div>
                    <div class="col s12 m4 l8">
                        <p>Olá, meu nome é Romano.</p>
                        <p>Sou graduado em Design Gráfico e possuo mais de 5 anos de experiência em design e desenvolvimento front-end.</p>
                        <p>Participei de grandes projetos como a revista digital Nova Escola, o portal do Sistema FIERGS e intranet Yasuda / Marítima Seguros.</p>

                        <p>Para saber mais visite meu perfil no <a href="https://br.linkedin.com/in/claudioromano13" target="_blank"><i class="fa fa-linkedin-square"></i> linkedin.</a></p>
                    </div>
                </div>

                <div class="row center tools">
                    <div class="col s12 m6 l3">
                        <p><i class="fa fa-html5"></i> HTML</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><i class="fa fa-css3"></i> CSS</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><i class="fa fa-usd"></i> JQuery</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><span>B</span> Bootstrap</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><i class="fa fa-github"></i> Git</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><span>M</span> Materialize</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><span>S</span> Sass</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><span>Ps</span> Photoshop</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><i class="fa fa-drupal"></i> Drupal</p>
                    </div>
                    <div class="col s12 m6 l3">
                        <p><span>A</span> Axure</p>
                    </div>
                </div>           
            </div>
        </section>
        
        <section id="customers">
            <div id="clientes"></div>
            <h2 class="center fontwhite">Clientes</h2>
            <h3 class="center fontwhite">Alguns clientes que já foram atendidos</h3>
            <div class="row thumbnail">
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/fvc.png" alt="Fundação Victor Civitta" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/neclube.png" alt="Nova Escola Clube" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/nescola.png" alt="Nova Escola" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/gescolar.png" alt="Gestão Escolar" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/gqe.png" alt="Gente Que Educa" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/mercantil.png" alt="Banco Mercantil do Brasil" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/basics.png" alt="Basics" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/argoit.png" alt="Argo IT" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/fiergs.png" alt="FIERGS" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/phi.png" alt="PHI Engenharia" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/titan.png" alt="Titan" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/yasuda.png" alt="Yasuda Marítima" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/brasilprev.png" alt="Brasilprev" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/sotreq.png" alt="Sotreq" />
                </div>
                <div class="col s12 m6 l3">
                    <img src="prod/images/clientes/giz.png" alt="Giz de Cera Studio" />
                </div>
            </div>

            <div class="carousel mobile">
                <a class="carousel-item"><img src="prod/images/clientes/fvc.png" alt="Fundação Victor Civitta" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/neclube.png" alt="Nova Escola Clube" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/nescola.png" alt="Nova Escola" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/gescolar.png" alt="Gestão Escolar" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/sotreq.png" alt="Sotreq" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/yasuda.png" alt="Yasuda Marítima" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/basics.png" alt="Basics" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/fiergs.png" alt="FIERGS" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/phi.png" alt="PHI Engenharia" /></a>
                <a class="carousel-item"><img src="prod/images/clientes/titan.png" alt="Titan" /></a>
            </div>
        </section>

        <section id="design">
            <div id="layouts"></div>
            <div class="parallax-design">
                <div class="mask"></div>
                <div class="parallax"><img src="prod/images/blue.jpg" alt="design" /></div>
            </div>
        </section>

        <footer>
            <div id="contact-form"></div>
            <div class="container box">
                <div class="row">
                      <div class="col s12">
                        <h2 class="center fontwhite">E ai, vamos trabalhar juntos ?</h2>
                        
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact" class="col s12" id="contact" action="" method="POST">
                            <div class="input-field col s6">
                                <input type="text" class="validate" name="form-name" id="nome" required="required">
                                <label for="icon_prefix"><i class="material-icons prefix">account_circle</i><span>Nome</span></label>
                            </div>
                            <div class="input-field col s6">
                                <input type="email" class="validate" name="form-email" id="email">
                                <label for="icon_prefix"><i class="material-icons prefix">email</i><span>E-mail</span></label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" class="validate" name="form-assunto" id="nome" required="required">
                                <label for="icon_prefix2"><i class="material-icons prefix">format_quote</i><span>Assunto</span></label>
                            </div>
                            <div class="input-field col s12">
                                <textarea class="materialize-textarea" name="form-mensagem" id="mensagem"></textarea>
                                <label for="icon_prefix2"><i class="material-icons prefix">mode_edit</i><span>Mensagem</span></label>
                            </div>
                            <button class="btn waves-effect waves-light orange" type="submit" id="enviar" name="action">Enviar
                                </button>    
                        </form>                    
                    </div>
                </div>
            </div>

            <div class="fixed-action-btn vertical click-to-toggle hide" id="action-button">
                <a class="btn-floating btn-large orange waves-effect waves-light">
                    <i class="material-icons">menu</i>
                </a>
                <ul>
                    <li><a class="btn-floating green tooltipped" href="tel:+5511997677804" data-position="left" data-delay="50" data-tooltip="11 99767-7804"><i class="fa fa-phone"></i></a></li>
                    <li><a class="btn-floating blue" href="https://br.linkedin.com/in/claudioromano13" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="fixed-action-btn hide" id="arrow-up">
                <a class="btn-floating btn-large waves-effect waves-light arrow-up">
                    <i class="material-icons">publish</i>
                </a>
            </div>
        </footer>
      
    </body>
</html>