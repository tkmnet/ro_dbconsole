<?php

namespace rrsoacis\apps\tkmnet\ro_dbconsole;

use rrsoacis\component\common\AbstractPage;
use rrsoacis\system\Config;

class MainPage extends AbstractPage
{
	const DATA_DIR = "/home/oacis/rrs-oacis/data";
	private $bases;
	private $base = null;
	private $cmd = '';
	public function controller($params)
	{
		$this->setTitle("DatabaseConsole");
		$this->printPage();
	}

	function body()
	{
		self::writeContentHeader("DatabaseConsole");
		self::beginContent();
		$this->writeBatchSetup();
		self::endContent();
	}

	function writeBatchSetup()
	{
		?>
		<div class="callout callout-danger">
			<h4>Caution !!</h4>
			<p>Data integrity is not guaranteed.</p>
		</div>
		<div class="row">
		    <div class="col-xs-12">
			<div class="box">
			    <div class="box-body">
				<form method='POST'>
		<?php
		print "<select class='form-control' name='db'>";
		print "<option>_main.db</option>";
		$userFiles = scandir(self::DATA_DIR);
		foreach ($userFiles as $userFile) {
			if ($userFile === '.'
				|| $userFile === '..'
				|| $userFile === '_main.db'
				|| substr($userFile, -3, 3) !== '.db') {
				continue;
			}
			print "<option>".$userFile."</option>";
		}
		?>
				    <input class="form-control" type=="text" placeholder="SQL" name>
				</form>
			    </div>
			    <!-- /.box-body -->
			</div>
		    </div>
		</div>
		<?php
	}
}
