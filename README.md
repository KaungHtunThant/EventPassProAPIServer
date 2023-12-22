# EventPassProAPIServer
<hr />
<h4>Developer</h4>
<h3>Kaung Htun Thant</h3>
<hr />
<h3>How to Start the Project</h3>
<p>
	1. Go to the directory.
	<br>
	2. Copy '.env.example' file and paste as '.env'.
	<br>
	3. Edit the '.env' file and enter your mysql user credentials.
	<br>
	4. Run these commands in terminal.
	<div>
		<code>composer install</code>
		<br>
		<code>php artisan migrate</code>
		<br>
		<code>php artisan db:seed</code>
		<br><br>
		(Optional: If you want to run test, run this command.)
		<br>
		<code>php artisan test</code>
	</div>
    <br>
	5. Lastly, run this command to serve.
	<div>
		<code>php artisan serve</code>
	</div>
</p>
