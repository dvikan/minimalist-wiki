<?php
    include __DIR__.'/header.tpl';
?>

<p>
Want to create a new page?
Create a new file in the `var` folder.
E.g. `var/svn-tutorial.md`.
</p>

<div>
<?php
    foreach($pages as $page) {
        print "<a href=\"$page\">$page</a> <br>";
    }
?>
</div>

<?php
    include __DIR__.'/footer.tpl';
?>
