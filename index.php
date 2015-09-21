<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="images/Envision.css" type="text/css" />

		<title>Tuckbox outline generator</title>
	</head>
	<body>
	<!-- wrap starts here -->
		<div id="wrap">

				<!--header -->
				<div id="header">

					<h1 id="logo-text"><a href="index.html">Tuckbox outline generator</a></h1>
					<p id="slogan">For all your card box needs</p>


				</div>

				<!-- content-wrap starts here -->
				<div id="content-wrap">
					<div id="sidebar">
						<h3>Details</h3>
						<p>
							This will generate a transparent PNG file with
							the outline of a tuckbox on it; sized in pixels
							to 300dpi.
						</p>
						<p>
							You can then load this into your preferred image
							editing software (altering the dpi to 300 as you
							do) and add the images you wish to the template.
						</p>
					</div>

					<div id="main">
						<form method="post" action="tuckbox.php">
							<h2>Size of box</h2>
							<table>
								<tbody>
									<tr>
										<td>Width of box</td>
										<td><input type="text" name="x" size="4" />mm</td>
										<td>(width of card)</td>
									</tr>
									<tr>
										<td>Height of box</td>
										<td><input type="text" name="y" size="4" />mm</td>
										<td>(height of card)</td>
									</tr>
									<tr>
										<td>Depth of box</td>
										<td><input type="text" name="z" size="4" />mm</td>
										<td>(stack height)</td>
									</tr>
								</tbody>
							</table>
							<input type="submit" value="Generate template" />
							<p />
						</form>
				</div>

			<!-- content-wrap ends here -->
			</div>

			<!--footer starts here-->
			<div id="footer">
				<p>
					<a href="https://github.com/djomp/PHP-tuckbox-generator">https://github.com/djomp/PHP-tuckbox-generator</a>
				</p>
			</div>

	<!-- wrap ends here -->
	</div>
	</body>

</html>
