<?php

// ID One

// public function sql()
// {
// 	set_time_limit(1000000);
//
// 	$query = System::decode_json_to_array($this->database->select('custody_chains', [
// 		'id'
// 	]));
//
// 	foreach ($query as $value)
// 	{
// 		$this->database->update('custody_chains', [
// 			'qr' => null,
// 			'pdf' => null
// 		], [
// 			'id' => $value['id']
// 		]);
// 	}
//
// 	// $query = System::decode_json_to_array($this->database->select('custody_chains', [
// 	// 	'id',
// 	// 	'token'
// 	// ], [
// 	// 	'date' => '2021-02-26'
// 	// ]));
// 	//
// 	// $exists = [];
// 	//
// 	// foreach ($query as $value)
// 	// {
// 	// 	if (in_array($value['token'], $exists))
// 	// 		$this->database->delete('custody_chains', ['id' => $value['id']]);
// 	// 	else
// 	// 		array_push($exists, $value['token']);
// 	// }
// }

// public function sql()
// {
// 	set_time_limit(1000000);
//
// 	$query = System::decode_json_to_array($this->database->select('custody_chains', [
// 		'[>]accounts' => [
// 			'account' => 'id'
// 		]
// 	], [
// 		'custody_chains.id',
// 		'accounts.path',
// 		'custody_chains.token',
// 	], [
// 		'custody_chains.account' => 19
// 	]));
//
// 	print_r(count($query));
//
// 	// foreach ($query as $value)
// 	// {
// 	// 	$qr_filename = 'covid_qr_' . $value['token'] . '_' . Dates::current_date('Y_m_d') . '_' . Dates::current_hour('H_i_s') . '.png';
// 	// 	$qr_content = 'https://id.one-consultores.com/' . $value['path'] . '/covid/' . $value['token'];
// 	// 	$qr_dir = PATH_UPLOADS . $qr_filename;
// 	// 	$qr_level = 'H';
// 	// 	$qr_size = 5;
// 	// 	$qr_frame = 3;
// 	//
// 	// 	QRcode::png($qr_content, $qr_dir, $qr_level, $qr_size, $qr_frame);
// 	//
// 	// 	$this->database->update('custody_chains', [
// 	// 		'qr' => $qr_filename
// 	// 	], [
// 	// 		'id' => $value['id']
// 	// 	]);
// 	// }
// }

// public function sql()
// {
// 	set_time_limit(1000000);
//
// 	$xlsx = SimpleXLSX::parse(PATH_UPLOADS . '13 Resultados Marbu Salud 13 de Marzo del 2021/hisopados  cancun 2021.xlsx');
// 	$start_process = '2021-03-13';
// 	$end_process = '2021-03-13';
//
//     foreach ($xlsx->rows() as $value)
//     {
// 		$value[2] = explode(' ', $value[2]);
// 		$value[7] = 2021 - intval(explode('-', $value[2][0])[0]);
//
// 		$this->database->insert('custody_chains', [
//             'account' => 19,
// 			'token' => System::generate_random_string(),
//             'employee' => null,
// 			'contact' => json_encode([
//                 'firstname' => strtoupper($value[0]),
//                 'lastname' => '',
// 				'ife' => $value[1],
//                 'birth_date' => $value[2][0],
//                 'age' => $value[7],
//                 'sex' => $value[3],
//                 'email' => 'cancun@moontravel.com.ar',
//                 'phone' => [
//                     'country' => '54',
//                     'number' => '1157072337'
//                 ],
//                 'travel_to' => strtoupper($value[4])
//             ]),
//             'type' => 'covid_pcr',
//             'reason' => 'random',
// 			'start_process' => $start_process,
// 			'end_process' => $end_process,
//             'results' => json_encode([
// 				'result' => $value[6],
// 				'unity' => 'INDEX',
// 				'reference_values' => 'not_detected'
// 			]),
//             'medicines' => null,
//             'prescription' => null,
// 			'collector' => 2,
// 			'location' => null,
// 			'date' => $start_process,
// 			'hour' => $value[5],
// 			'comments' => null,
//             'signatures' => null,
// 			'qr' => null,
// 			'pdf' => null,
// 			'lang' => 'es',
// 			'closed' => true,
// 			'user' => 1,
// 			'deleted' => false
//         ]);
//     }
// }

// public function sql()
// {
// 	set_time_limit(1000000);
//
// 	$xlsx = SimpleXLSX::parse(PATH_UPLOADS . '13 Resultados Marbu Salud 13 de Marzo del 2021/hisopados  cancun 2021 (Positivos).xlsx');
// 	$start_process = '2021-03-13';
//
// 	$query = System::decode_json_to_array($this->database->select('custody_chains', [
// 		'id',
// 		'contact'
// 	], [
// 		'AND' => [
// 			'account' => 19,
// 			'date' => $start_process
// 		]
// 	]));
//
// 	print_r(count($query));
//
//     // foreach ($xlsx->rows() as $value)
//     // {
// 	// 	foreach ($query as $subvalue)
// 	// 	{
// 	// 		if ($value[1] == $subvalue['contact']['ife'])
// 	// 		{
// 	// 			$this->database->update('custody_chains', [
// 	// 	            'results' => json_encode([
// 	// 					'result' => $value[4],
// 	// 					'unity' => 'INDEX',
// 	// 					'reference_values' => 'not_detected'
// 	// 				])
// 	// 	        ], [
// 	// 				'id' => $subvalue['id']
// 	// 			]);
// 	// 		}
// 	// 	}
//     // }
// }

// public function sql()
// {
// 	set_time_limit(100000000);
//
// 	$query = System::decode_json_to_array($this->database->select('custody_chains', [
// 		'id',
// 		'token',
// 		'qr',
// 		'lang',
// 		'token',
// 		'contact',
// 		'hour',
// 		'date',
// 		'results',
// 		'type',
// 		'start_process',
// 		'end_process',
// 	], [
// 		'account' => 19
// 	]));
//
// 	// print_r(count($query));
//
// 	foreach ($query as $value)
// 	{
// 		$pdf_filename = $value['start_process'] . '_' . $value['contact']['firstname'] . '_' . $value['contact']['lastname'] . '_' . $value['token'] . '.pdf';
//
// 		$chemical = $this->database->select('system_chemicals', [
// 			'id',
// 			'name',
// 			'signature',
// 			'card'
// 		], [
// 			'id' => 1
// 		]);
//
// 		$html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
// 		$writing =
// 		'<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:20%;margin:0px;padding:10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<img style="width:100%;" src="https://' . Configuration::$domain . '/images/marbu_logotype_color.png">
// 				</td>
// 				<td style="width:60%;margin:0px;padding:0px 0px 0px 10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<table style="width:100%;margin:0px;padding:0px;border:0px;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:600;text-align:left;color:#004770;">Marbu Salud S.A. de C.V.</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">MSA1907259GA</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">Av. Del Sol SM47 M6 L21 Planta Alta</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">CP: 77506 Cancún, Qroo. México</td>
// 						</tr>
// 					</table>
// 				</td>
// 				<td style="width:20%;margin:0px;padding:10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<img style="width:100%;" src="https://' . Configuration::$domain . '/uploads/' . $value['qr'] . '">
// 				</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:28px;font-weight:600;text-align:center;text-transform:uppercase;color:#004770;">' . Languages::email('result_report')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 10px 10px;border:0px;box-sizing:border-box;font-size:14px;font-weight:400;text-align:center;text-transform:uppercase;color:#004770;">' . Languages::email('laboratory_analisys')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('n_petition')[$value['lang']] . ': ' . $value['token'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('registry_date')[$value['lang']] . ': ' . $value['start_process'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('company')[$value['lang']] . ': ' . $value['contact']['travel_to'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('patient')[$value['lang']] . ': ' . $value['contact']['firstname'] . ' ' . $value['contact']['lastname'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('birth_date')[$value['lang']] . ': ' . $value['contact']['birth_date'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('age')[$value['lang']] . ': ' . $value['contact']['age'] . ' ' . Languages::email('years')[$value['lang']] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('sex')[$value['lang']] . ': ' . Languages::email($value['contact']['sex'])[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('get_date')[$value['lang']] . ': ' . $value['start_process'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('get_hour')[$value['lang']] . ': ' . $value['hour'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . $chemical[0]['name'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('start_process')[$value['lang']] . ': ' . $value['start_process'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('end_process')[$value['lang']] . ': ' . $value['end_process'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('id_patient')[$value['lang']] . ': ' . $value['contact']['ife'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;"></td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:14px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('immunological_analysis')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('exam')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('result')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('unity')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('reference_values')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">';
//
// 		if ($value['type'] == 'covid_pcr')
// 			$writing .= '<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">PCR-SARS-CoV-2 (COVID-19)</td>';
// 		else if ($value['type'] == 'covid_an')
// 			$writing .= '<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">Ag-SARS-CoV-2 (COVID-19)</td>';
//
// 		$writing .=
// 		'		<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email($value['results']['result'])[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('INDEX')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('not_detected')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:100%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('atila_biosystem')[$value['lang']] . ' | ' . Languages::email('nasopharynx_secretion')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_1')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_2')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_3')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('valid_results_by')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;text-align:center;">
// 					<img style="width:100px" src="https://' . Configuration::$domain . '/uploads/' . $chemical[0]['signature'] . '">
// 				</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . $chemical[0]['name'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('health_manager')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:0px 10px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('identification_card')[$value['lang']] . ': ' . $chemical[0]['card'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#000;">' . Languages::email('alert_pdf_covid')[$value['lang']] . '</td>
// 			</tr>
// 		</table>';
// 		$html2pdf->writeHTML($writing);
//
// 		if ($value['results']['result'] == 'negative')
// 			$html2pdf->output(PATH_UPLOADS . $pdf_filename, 'F');
// 		else if ($value['results']['result'] == 'positive')
// 			$html2pdf->output(PATH_UPLOADS . 'Positivos/' . $pdf_filename, 'F');
//
// 		$this->database->update('custody_chains', [
// 			'pdf' => $pdf_filename
// 		], [
// 			'id' => $value['id']
// 		]);
// 	}
// }

// public function sql()
// {
// 	set_time_limit(100000000);
//
// 	$start_process = '2021-03-16';
// 	$end_process = '2021-03-16';
//
// 	$query = System::decode_json_to_array($this->database->select('custody_chains', [
// 		'[>]accounts' => [
// 			'account' => 'id'
// 		]
// 	], [
// 		'custody_chains.id',
// 		'custody_chains.token',
// 		'custody_chains.qr',
// 		'custody_chains.lang',
// 		'custody_chains.token',
// 		'custody_chains.contact',
// 		'custody_chains.hour',
// 		'custody_chains.date',
// 		'custody_chains.type',
// 		'accounts.path'
// 	], [
// 		'AND' => [
// 			'custody_chains.type' => ['covid_pcr','covid_an'],
// 			'custody_chains.date' => $start_process,
// 			'custody_chains.hour[<>]' => ['00:00:00','13:00:00'],
// 			'custody_chains.closed' => false,
// 			'custody_chains.deleted' => false
// 		]
// 	]));
//
// 	// print_r(count($query));
//
// 	foreach ($query as $value)
// 	{
// 		$date = explode('-', $value['date']);
// 		$hour = explode(':', $value['hour']);
// 		$pdf_filename = 'covid_pdf_' . $value['token'] . '_' . $date[0] . '_' . $date[1] . '_' . $date[2] . '_' . $hour[0] . '_' . $hour[1] . '_' . $hour[2] . '.pdf';
//
// 		$chemical = $this->database->select('system_chemicals', [
// 			'id',
// 			'name',
// 			'signature',
// 			'card'
// 		], [
// 			'id' => 1
// 		]);
//
// 		$html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
// 		$writing =
// 		'<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:20%;margin:0px;padding:10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<img style="width:100%;" src="https://' . Configuration::$domain . '/images/marbu_logotype_color.png">
// 				</td>
// 				<td style="width:60%;margin:0px;padding:0px 0px 0px 10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<table style="width:100%;margin:0px;padding:0px;border:0px;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:600;text-align:left;color:#004770;">Marbu Salud S.A. de C.V.</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">MSA1907259GA</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">Av. Del Sol SM47 M6 L21 Planta Alta</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:14px;font-weight:400;text-align:left;color:#004770;">CP: 77506 Cancún, Qroo. México</td>
// 						</tr>
// 					</table>
// 				</td>
// 				<td style="width:20%;margin:0px;padding:10px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 					<img style="width:100%;" src="https://' . Configuration::$domain . '/uploads/' . $value['qr'] . '">
// 				</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:28px;font-weight:600;text-align:center;text-transform:uppercase;color:#004770;">' . Languages::email('result_report')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 10px 10px;border:0px;box-sizing:border-box;font-size:14px;font-weight:400;text-align:center;text-transform:uppercase;color:#004770;">' . Languages::email('laboratory_analisys')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('n_petition')[$value['lang']] . ': ' . $value['token'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('registry_date')[$value['lang']] . ': ' . $start_process . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('company')[$value['lang']] . ': N/A</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('patient')[$value['lang']] . ': ' . $value['contact']['firstname'] . ' ' . $value['contact']['lastname'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('birth_date')[$value['lang']] . ': ' . $value['contact']['birth_date'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('age')[$value['lang']] . ': ' . $value['contact']['age'] . ' ' . Languages::email('years')[$value['lang']] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('sex')[$value['lang']] . ': ' . Languages::email($value['contact']['sex'])[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('get_date')[$value['lang']] . ': ' . $start_process . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('get_hour')[$value['lang']] . ': ' . $value['hour'] . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . $chemical[0]['name'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('start_process')[$value['lang']] . ': ' . $start_process . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('end_process')[$value['lang']] . ': ' . $end_process . '</td>
// 				<td style="width:33.33%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('id_patient')[$value['lang']] . ': ' . $value['contact']['ife'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;"></td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:14px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('immunological_analysis')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#deeaf6;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('exam')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('result')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('unity')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('reference_values')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">';
//
// 		if ($value['type'] == 'covid_pcr')
// 			$writing .= '<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">PCR-SARS-CoV-2 (COVID-19)</td>';
// 		else if ($value['type'] == 'covid_an')
// 			$writing .= '<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">Ag-SARS-CoV-2 (COVID-19)</td>';
//
// 		$writing .=
// 		'		<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('negative')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('INDEX')[$value['lang']] . '</td>
// 				<td style="width:25%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#004770;">' . Languages::email('not_detected')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;border-top:2px solid #5b9bd5;border-bottom:2px solid #5b9bd5;">
// 				<td style="width:100%;margin:0px;padding:10px 0px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:left;color:#004770;">' . Languages::email('atila_biosystem')[$value['lang']] . ' | ' . Languages::email('nasopharynx_secretion')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_1')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_2')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#004770;">' . Languages::email('notes_pcr_an_3')[$value['lang']] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('valid_results_by')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;text-align:center;">
// 					<img style="width:100px" src="https://' . Configuration::$domain . '/uploads/' . $chemical[0]['signature'] . '">
// 				</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px 10px 0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . $chemical[0]['name'] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:0px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('health_manager')[$value['lang']] . '</td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:0px 10px 10px 10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">' . Languages::email('identification_card')[$value['lang']] . ': ' . $chemical[0]['card'] . '</td>
// 			</tr>
// 		</table>
// 		<table style="width:100%;margin:0px;padding:0px;border:0px;background-color:#fff;">
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 				<td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:justify;color:#000;">' . Languages::email('alert_pdf_covid')[$value['lang']] . ' <strong style="color:#f44336;">' . Languages::email('accept_terms')[$value['lang']] . '</strong></td>
// 			</tr>
// 			<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 		        <td style="width:100%;margin:0px;padding:10px;border:0px;box-sizing:border-box;font-size:12px;font-weight:600;text-align:center;color:#004770;">+ (52) 998 440 3302 | marbu@one-consultores.com | marbu.one-consultores.com</td>
// 		    </tr>
// 		</table>';
// 		$html2pdf->writeHTML($writing);
// 		$html2pdf->output(PATH_UPLOADS . $pdf_filename, 'F');
//
// 		$query = $this->database->update('custody_chains', [
// 			'end_process' => $end_process,
// 			'results' => json_encode([
// 				'result' => 'negative',
// 				'unity' => 'INDEX',
// 				'reference_values' => 'not_detected'
// 			]),
// 			'chemical' => 1,
// 			'pdf' => $pdf_filename,
// 			'closed' => true,
// 			'user' => 1
// 		], [
// 			'id' => $value['id']
// 		]);
//
// 		$mail = new Mailer(true);
//
// 		try
// 		{
// 			$mail->setFrom(Configuration::$vars['marbu']['email'], 'Marbu Salud');
// 			$mail->addAddress($value['contact']['email'], $value['contact']['firstname'] . ' ' . $value['contact']['lastname']);
// 			$mail->addAttachment(PATH_UPLOADS . $pdf_filename);
// 			$mail->Subject = '¡' . Languages::email('hi')[$value['lang']] . ' ' . explode(' ',  $value['contact']['firstname'])[0] . '! ' . Languages::email('your_results_are_ready')[$value['lang']];
// 			$mail->Body =
// 			'<html>
// 				<head>
// 					<title>' . $mail->Subject . '</title>
// 				</head>
// 				<body>
// 					<table style="width:100%;max-width:600px;margin:0px;padding:0px;border:0px;background-color:#004770;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100px;margin:0px;padding:20px 0px 20px 20px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 								<img style="width:100px" src="https://' . Configuration::$domain . '/images/marbu_logotype_color_circle.png">
// 							</td>
// 							<td style="width:auto;margin:0px;padding:20px;border:0px;box-sizing:border-box;vertical-align:middle;">
// 								<table style="width:100%;margin:0px;padding:0px;border:0px;">
// 									<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 										<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:12px;font-weight:600;text-align:right;color:#fff;">Marbu Salud S.A. de C.V.</td>
// 									</tr>
// 									<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 										<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:12px;font-weight:400;text-align:right;color:#fff;">MSA1907259GA</td>
// 									</tr>
// 									<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 										<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:12px;font-weight:400;text-align:right;color:#fff;">Av. Del Sol SM47 M6 L21 Planta Alta</td>
// 									</tr>
// 									<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 										<td style="width:100%;margin:0px;padding:0px;border:0px;font-size:12px;font-weight:400;text-align:right;color:#fff;">CP: 77506 Cancún, Qroo. México</td>
// 									</tr>
// 								</table>
// 							</td>
// 						</tr>
// 					</table>
// 					<table style="width:100%;max-width:600px;margin:20px 0px;padding:0px;border:1px dashed #000;box-sizing:border-box;background-color:#fff;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;font-size:18px;font-weight:600;text-align:center;text-transform:uppercase;color:#000;">¡' . Languages::email('ready_results')[$value['lang']] . '!</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:center;color:#757575;">¡' . Languages::email('hi')[Session::get_value('vkye_lang')] . ' <strong>' . explode(' ', $value['contact']['firstname'])[0] . '</strong>! ' . Languages::email('get_covid_results_1')[$value['lang']] . ' <strong>' . Dates::format_date($value['date'], 'short') . '</strong> ' . Languages::email('get_covid_results_2')[$value['lang']] . '</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;">
// 								<a style="width:100%;display:block;margin:0px;padding:10px;border:1px solid #bdbdbd;border-radius:5px;box-sizing:border-box;background-color:#fff;font-size:14px;font-weight:400;text-align:center;text-decoration:none;color:#757575;" href="https://api.whatsapp.com/send?phone=' . Configuration::$vars['marbu']['phone'] . '&text=Hola, soy ' . $value['contact']['firstname'] . ' ' . $value['contact']['lastname'] . '. Mi folio es: ' . $value['token'] . '. ">' . Languages::email('whatsapp_us_to_support')[$value['lang']] . '</a>
// 							</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;">
// 								<img style="width:100%;" src="https://' . Configuration::$domain . '/uploads/' . $value['qr'] . '">
// 							</td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px;border:0px;box-sizing:border-box;">
// 								<a style="width:100%;display:block;margin:0px;padding:10px;border:0px;border-radius:5px;box-sizing:border-box;background-color:#009688;font-size:14px;font-weight:400;text-align:center;text-decoration:none;color:#fff;" href="https://' . Configuration::$domain . '/' . $value['path'] . '/covid/' . $value['token'] . '">' . Languages::email('view_online_results')[$value['lang']] . '</a>
// 							</td>
// 						</tr>
// 					</table>
// 					<table style="width:100%;max-width:600px;margin:0px;padding:0px;border:0px;background-color:#0b5178;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;"><a style="text-decoration:none;color:#fff;" href="tel:' . Configuration::$vars['marbu']['phone'] . '">' . Configuration::$vars['marbu']['phone'] . '</a></td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;"><a style="text-decoration:none;color:#fff;" href="mailto:' . Configuration::$vars['marbu']['email'] . '">' . Configuration::$vars['marbu']['email'] . '</a></td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px 20px 20px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;"><a style="text-decoration:none;color:#fff;" href="https://' . Configuration::$vars['marbu']['website'] . '">' . Configuration::$vars['marbu']['website'] . '</a></td>
// 						</tr>
// 					</table>
// 					<table style="width:100%;max-width:600px;margin:0px;padding:0px;border:0px;background-color:#004770;">
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:20px 20px 0px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;">' . Languages::email('power_by')[$value['lang']] . ' <a style="font-weight:600;text-decoration:none;color:#fff;" href="https://id.one-consultores.com">' . Configuration::$web_page . ' ' . Configuration::$web_version . '</a></td>
// 						</tr
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;">Copyright (C) <a style="text-decoration:none;color:#fff;" href="https://one-consultores.com">One Consultores</a></td>
// 						</tr>
// 						<tr style="width:100%;margin:0px;padding:0px;border:0px;">
// 							<td style="width:100%;margin:0px;padding:0px 20px 20px 20px;border:0px;box-sizing:border-box;font-size:12px;font-weight:400;text-align:left;color:#fff;">Software ' . Languages::email('development_by')[$value['lang']] . ' <a style="text-decoration:none;color:#fff;" href="https://codemonkey.com.mx">Code Monkey</a></td>
// 						</tr>
// 					</table>
// 				</body>
// 			</html>';
// 			$mail->send();
// 		}
// 		catch (Exception $e) {}
// 	}
// }
