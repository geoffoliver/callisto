{
	'baseUrl': './',
	'appDir': './',
	'dir': '../../../../webroot/js/',
	'wrap': true,
	'removeCombined': true,
	'optimize': 'uglify2',
	'preserveLicenseComments': false,
	'skipDirOptimize': true,
	'insertRequire': ['main'],
	'map': {
		'*': {
			'jquery': 'callisto-jquery'
		},
		'callisto-jquery': {
			'jquery': 'jquery'
		}
	},
	'paths': {
		'almond': '../../vendor/almond/almond',
		'jquery': '../../vendor/jquery/dist/jquery',
		'callisto-jquery': 'lib/callisto-jquery'
	},
	'modules': [
		{
			'name': 'main',
			'include': [
				'almond'
			]
		}
	]
}
