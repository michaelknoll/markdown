<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_mkdwn_domain_model_contentelement'] = array(
	'ctrl' => $TCA['tx_mkdwn_domain_model_contentelement']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'source,render_cache',
	),
	'types' => array(
		'1' => array('showitem'	=> 'source,render_cache'),
	),
	'palettes' => array(
		'1' => array('showitem'	=> ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude'			=> 1,
			'label'				=> 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config'			=> array(
				'type'					=> 'select',
				'foreign_table'			=> 'sys_language',
				'foreign_table_where'	=> 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			)
		),
		'l18n_parent' => array(
			'displayCond'	=> 'FIELD:sys_language_uid:>:0',
			'exclude'		=> 1,
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config'		=> array(
				'type'			=> 'select',
				'items'			=> array(
					array('', 0),
				),
				'foreign_table' => 'tx_mkdwn_domain_model_contentelement',
				'foreign_table_where' => 'AND tx_mkdwn_domain_model_contentelement.uid=###REC_FIELD_l18n_parent### AND tx_mkdwn_domain_model_contentelement.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'		=>array(
				'type'		=>'passthrough',
			)
		),
		't3ver_label' => array(
			'displayCond'	=> 'FIELD:t3ver_label:REQ:true',
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config'		=> array(
				'type'		=>'none',
				'cols'		=> 27,
			)
		),
		'hidden' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'	=> array(
				'type'	=> 'check',
			)
		),
		'source' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:mkdwn/Resources/Private/Language/locallang_db.xml:tx_mkdwn_domain_model_contentelement.source',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'render_cache' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:mkdwn/Resources/Private/Language/locallang_db.xml:tx_mkdwn_domain_model_contentelement.render_cache',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
	),
);
?>