&copy; <?php
			$copyYear = 2006; // Set your website start date
			$curYear = date('Y'); // Keeps the second year updated
			echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
		?> Companyname