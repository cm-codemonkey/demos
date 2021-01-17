<?php

defined('_EXEC') or die;

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (Format::exist_ajax_request() == true)
		{
			if ($_POST['action'] == 'contact')
			{
				$errors = [];

				if (empty($_POST['name']))
					array_push($errors, ['No deje el nombre vacío']);

				if (empty($_POST['email']))
					array_push($errors, ['No deje el correo vacío']);

				if (empty($_POST['phone']))
					array_push($errors, ['No deje el teléfono vacío']);

				if (empty($_POST['message']))
					array_push($errors, ['No deje el mensaje vacío']);

				if (empty($errors))
				{
					$mail = new Mailer(true);

					try
					{
						$mail->setFrom(Configuration::$smtp_emailer, Configuration::$web_page);
						$mail->addAddress(Configuration::$smtp_contact, Configuration::$web_page);
						$mail->Subject = 'Nuevo contacto';
						$mail->Body = 'Nombre: ' . $_POST['name'] . '<br>Correo electrónico: ' . $_POST['email'] . '<br>Teléfono: ' . $_POST['phone'] . '<br>Mensaje: ' . $_POST['message'];
						$mail->send();
					}
					catch (Exception $e) {}

					echo json_encode([
						'status' => 'success'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}
		}
		else
		{
			define('_title', Configuration::$web_page . ' | {$lang.index}');

			$template = $this->view->render($this, 'index');

			echo $template;
		}
	}
}
