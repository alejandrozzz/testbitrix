<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2018 Bitrix
 */
namespace Bitrix\Main\Mail;

/**
 * Class Part
 * @package Bitrix\Main\Mail
 */
class Part
{
	/** @var [] $headers Headers. */
	protected $headers = [];

	/** @var string $body Body. */
	protected $body = '';

	/**
	 * Add header.
	 *
	 * @param string $name Name.
	 * @param string $value Value.
	 * @return $this
	 */
	public function addHeader($name, $value)
	{
		$this->headers[$name] = $value;
		return $this;
	}

	/**
	 * Set headers.
	 *
	 * @param array $headers Headers.
	 * @return $this
	 */
	public function setHeaders(array $headers)
	{
		$this->headers = [];
		foreach ($headers as $name => $value)
		{
			$this->addHeader($name, $value);
		}
		return $this;
	}

	/**
	 * Get headers.
	 *
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * Get header.
	 *
	 * @param string $name Name.
	 * @return mixed|null
	 */
	public function getHeader($name)
	{
		return isset($this->headers[$name]) ? $this->headers[$name] : null;
	}

	/**
	 * Set body.
	 *
	 * @param string $body Body.
	 * @return $this
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * Get body.
	 *
	 * @return string
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Convert to string.
	 *
	 * @return string
	 */
	public function toStringBody()
	{
		$eol = Mail::getMailEol();
		return $this->splitBody($this->body) . $eol . $eol;
	}

	/**
	 * Convert headers to string.
	 *
	 * @return string
	 */
	public function toStringHeaders()
	{
		$result = '';
		$eol = Mail::getMailEol();
		foreach ($this->headers as $name => $value)
		{
			$result .= $name . ': '. $value . $eol;
		}

		return $result ? $result  : '';
	}

	/**
	 * Convert object to string.
	 *
	 * @return string
	 */
	public function toString()
	{
		$eol = Mail::getMailEol();
		return $this->toStringHeaders() . $eol . $this->toStringBody();
	}

	/**
	 * Magic method.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->toString();
	}

	protected function splitBody($body)
	{
		if($this->getHeader('Content-Transfer-Encoding') === 'base64')
		{
			// Line length is 70 chars. As a recommended in mail() php documentation.
			return rtrim(chunk_split(base64_encode($body), 70));
		}
		else
		{
			//Some MTA has 4K limit for fgets function. So we have to split the message body.
			return implode(
				"\n",
				array_filter(
					preg_split("/(.{512}[^ ]*[ ])/", $body . " ", -1, PREG_SPLIT_DELIM_CAPTURE)
				)
			);
		}
	}
}
