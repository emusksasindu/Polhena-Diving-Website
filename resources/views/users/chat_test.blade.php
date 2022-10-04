<form action="" method="post">
    {{ Auth::user()->id }}
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <br><input type="submit" value="Send">

</form>