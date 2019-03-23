<?php

require_once 'vendor/autoload.php';

/**
 * Load Drupal 8's default sandbox policy.
 *
 * @see web/core/lib/Drupal/Core/Template/TwigSandboxPolicy.php
 */
require_once 'src/Twig/TwigSandboxPolicy.php';

/**
 * Load Drupal 8 Devel module's Kint class.
 *
 * @see web/modules/contrib/devel/kint/kint
 */
require_once 'kint/Kint.class.php';

/**
 * Load Drupal 8 Devel module's Kint extension.
 *
 * @see web/modules/contrib/devel/kint/src/Twig/KintExtension.php
 */
require_once 'src/Twig/KintExtension.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Add sandbox policy.
$policy = new \TestProject\Twig\TwigSandboxPolicy();
$sandbox = new \Twig_Extension_Sandbox($policy, TRUE);
$twig->addExtension($sandbox);

// Add kint extension.
$twig->addExtension(new \TestProject\Twig\KintExtension());

echo $twig->render('test.html.twig', ['name' => 'Test']);