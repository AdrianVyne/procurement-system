<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$Description = 'Procurement System:';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $Description ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F4F3EF;
        }
    </style>
</head>

<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">
                        <?= $this->fetch('title') ?>
                    </a></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="right">
                <?php if ($loggedIn): ?>
                    <li>
                        <?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?>
                    </li>
                <?php elseif ($this->request->getParam('action') === 'register'): ?>
                    <li>
                        <?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']); ?>
                    </li>
                <?php else: ?>
                    <li>
                        <?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?>
                    </li>
                <?php endif; ?>
            </ul>
        </section>

    </nav>
    <div class="text-center">
        <h3>
            <?= $this->Flash->render() ?>
        </h3>
    </div>
    <section>
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('test.js') ?>

</body>

</html>