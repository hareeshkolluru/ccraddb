<html><head><title>My Guestbook</title></head>
<body>
<h1>Welcome to my Guestbook</h1>
<h2>Please write me a little note below</h2>
<form action="<?="$PHP_SELF#results"?>" method="POST">
<textarea cols=40 rows=5 name=note wrap=virtual></textarea>
<input type=submit value=" Send it ">
</form>
<?if(isset($note)) {
$fp = fopen("/tmp/notes.txt","a");
fputs($fp,nl2br($note).'<br>');
fclose($fp);
}
?><h2>The entries so far:</h2>
<? @ReadFile("/tmp/notes.txt") ?>
</body></html>