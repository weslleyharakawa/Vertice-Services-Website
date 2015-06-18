<?
/*******************************************************
* config.php -											
* 	Arquivo de configura��o para o WESPA Calend�rio v0.2		
* 	Autor: WESPA Digital <info@wespa.com.br>			
*														
* 	Configuration directives set with php's define()	
* 	function.  Usage: define("CONSTANT-ID", 			
*	"scalar_value")										
* 														
* Para perguntas ou coment�rios, visite:						
* 	http://www.wespa.com.br
*******************************************************/

/*******************************************************
***** Configura��es do Banco de Dados MySQL ***********
*******************************************************/

define("DB_NAME", "verticel_calend");				// nome do banco de dados
define("DB_USER", "verticel_calend");				// nome de usu�rio no banco de dados
define("DB_PASS", "123mudar");				// senha do banco de dados
define("DB_HOST", "localhost");			// servidor de banco de dados

// Prefixo adicionado aos nomes de tabelas. N�o autere ap�s
// a instala��o inicial.
define("DB_TABLE_PREFIX", "calendar_");

/*******************************************************
************** Op��es Idiom�ticas *********************
*******************************************************/

define("LANGUAGE_CODE", "en");

/*******************************************************
********* Op��es Visuais do WESPA Calend�rio ************
*******************************************************/

// Define o n�mero m�ximo de eventos a serem visualizados 
// no dia, na tabela do m�s.
define("MAX_TITLES_DISPLAYED", 10);

// Limite de caracteres para o t�tulo. Ajuste este evento
// quando os t�tulos forem muito grandes e precise de
// mais espa�o para exibilos no calend�rio.
define("TITLE_CHAR_LIMIT", 100);

// Nome do modelo.  e.g. "default" se o arquivo 
// que cont�m o modelo visual for "default.php".
define("TEMPLATE_NAME", "default");

// Especifica o dia em que come�a a semana no
// WESPA Calend�rio.  O valor deve ser num�rico
// e � um intervalo 0-6.  Zero indica que a semana
// come�a no Domingo, 1 indica que � na Segunda-feira,
// 2 Ter�a-feira, 3 Quarta-feira... Para a maioria dos
// usu�rios se utiliza zero.
define("WEEK_START", 1);

// Especifica o formato de exibi��o da hora.
// Est� dispon�vel dois formatos: "12hr" exibe
// horas 1-12 com um am/pm, e "24hr" exibe
// horas 00-23 sem am/pm.
define("TIME_DISPLAY_FORMAT", "12hr");

define("CURR_TIME_OFFSET", 0);
?>
