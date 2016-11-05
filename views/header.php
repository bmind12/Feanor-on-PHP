<!DOCTYPE html>

<head>
    
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/styles.css">
    
    <?php if (isset($title)): ?>
        <title>Feanor Studio: <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Feanor Studio</title>
    <?php endif ?>
    
</head>

<body>
    
    <div id="head">
        <img id="logo" src="http://feanor.cz/images/logo_studio.gif">
    </div>
    
    <div id="top">
        <div id="menu-bar">
            <ul>
                <li id="selected"><a href="#">Home</a></li>
                <li><a href="http://feanor.cz/portfolio/portraits-photo">Photo</a></li>
                <li><a href="http://feanor.cz/paintings/oil">Paintings</a></li>
                <li><a href="http://feanor.cz/contacts/">Contact</a></li>
            </ul>
        </div>
    </div>
    
    <div id="middle">