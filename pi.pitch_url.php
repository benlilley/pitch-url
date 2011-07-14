<?php
$plugin_info = array(
	'pi_name'          => 'Pitch URL',
	'pi_version'       => '1.0.1',
	'pi_author'        => 'Pitch',
	'pi_author_url'    => 'http://pitch.net.nz',
	'pi_description'   => 'Used to grab the url of the current page.',
	'pi_usage'         => pitch_url::usage()
	);
               
class Pitch_url
{
	function pitch_url()
	{
		// First lets get an instance of EE.
		$this->EE =& get_instance();
		
		// Fetch the full param to see if user just wants the current url.
		$param = $this->EE->TMPL->fetch_param('full');
		
		// Depending on what they have provided in the param do the below.
		switch ($param)
		{
				// Give them the complete url.
				case "yes":
					$this->return_data = $this->EE->functions->fetch_current_uri().'/';
					break;
					
				// Give them just the segments after the site_url.
				case "no":
					$this->return_data = $this->EE->uri->uri_string();
					break;
		}
		
		// Can also be written as below but limits options if want to add further cases.
		//$current_url = ($parameter = 'yes') ? $this->EE->functions->fetch_current_uri() : $this->EE->uri->uri_string();
	}

	
	function usage()
	{
		ob_start(); 
?>

	An extremely simple plugin. You have the option of grabbing the complete url of the current page like so:
	{exp:pitch_url full="yes"}
		
	Or just grab the segments after the site_url:
	{exp:pitch_url full="no"}
		
	That's it, extremely simple.

<?php
		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
}

/* End of file pi.pitch_url.php */
/* Location: /system/expressionengine/third_party/pitch_url/pi.pitch_url.php */