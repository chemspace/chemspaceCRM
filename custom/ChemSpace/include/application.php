<?php
/**
 * Singleton class
 *
 */
final class ChemSpaceApplication
{
	var $db = null;

	/**
	 * Call this method to get singleton
	 *
	 * @return ChemSpaceApplication
	 */
	public static function getInstance() {
		static $instance = null;

		if (null === $instance) {
			$instance = new ChemSpaceApplication();
		}

		return $instance;
	}

	/**
	 * Private construct so nobody else can instance it
	 *
	 */
	private function __construct() {
	}

	/**
	 * Connect to database and store the handler
	 *
	 */
	public function connect($db) {
		$this->db = new mysqli($db['host'], $db['user'], $db['pswd'], $db['name']);
	}

	/**
	 * Close database connection and flush the output buffer
	 *
	 */
	public function finish() {
		$this->db->close();
		$this->db = null;
		ob_end_flush();
	}
}
?>