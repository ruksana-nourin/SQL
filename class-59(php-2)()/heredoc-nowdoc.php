<?php
    $name = "Ruksana Nourin";
    echo <<<HEREDOC
    $name is always sleepy.
    <p>Lorem ipsum dolor sit, amet <i>hfdgfgsdj</i> consectetur adipisicing elit. Quibusdam blanditiis eaque rerum quisquam deserunt voluptatibus eligendi iure sequi, reprehenderit natus, soluta incidunt itaque odit nihil odio. Nisi recusandae ab quos.<b>hfdgfgsdj</b></p>
    HEREDOC;

    echo "<br>-------------<br>";
    
    echo <<<'NOWEDOC'
    $name is always sleepy.
    <p>Lorem ipsum dolor sit, amet <i>hfdgfgsdj</i>consectetur adipisicing elit. Quibusdam blanditiis eaque rerum quisquam deserunt voluptatibus eligendi iure sequi, reprehenderit natus, soluta incidunt itaque odit nihil odio. Nisi recusandae ab quos.<b>hfdgfgsdj</b></p>
    NOWEDOC;
?>