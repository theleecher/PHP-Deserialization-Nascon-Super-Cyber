<?php
class ReadfromFile{
	public function __toString(){
		$this->filename = str_replace(['flag', 'txt', 'fl', 'ag'], '', $this->filename);
		if (isset($this->func) && isset($this->param) ){
			$functionName = $this->func;
			$functionName($this->param);
		}
		return file_get_contents($this->filename);
		
	}

	public function __invoke(){
		//echo "__invoke is Called";
		file_put_contents($this->LogFileName,base64_decode($this->LogContent), FILE_APPEND);
	}
}
class LogtoFile{
	public function __invoke(){
		file_put_contents($this->LogFileName,base64_decode($this->LogContent));
	}
}

class hacked{
	public function noHack(){
		system($this->command);
	}
}

class Data{
	public $username;
	public $OrganizationName;
	public $SizeOfOrg;
	public $PentestFreq;
	
	public function PrintData(){
		echo '<title>The Information Provided</title>
		<style>
			.card {
				max-width: 400px;
				margin: 20px auto; 
				padding: 20px;
				border: 1px solid #ccc;
				border-radius: 5px; 
				text-align: left;
			}

			.card p {
				margin: 0;
				margin-bottom: 10px;
			}

			.card h2 {
				color: #1e90ff;
				margin-top: 0;
			}
		</style>
	</head>
	<body>
		<div class="card">
			<h2>User Information</h2>
			<p>User Name: '.$this->username.'</p>
			<p>Organization Name: '.$this->OrganizationName.'</p> 
			<p>Size of organization: '.$this->SizeOfOrg.'</p> 
			<p>Pentesting Frequency: '.$this->PentestFreq.'</p>
		</div>
	</body>';
	}
}

?>