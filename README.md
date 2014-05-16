# Abstracting Hasher from MODX core

### Install with composer

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/silentworks/hasher"
            }
        ],
        "require": {
            "projectx/hasher": "dev-master"
        }
    }

### Usage

    <?php
    use Hasher\Hasher;
    
    $hasher = new Hasher(new \Hasher\Providers\MD5, 'ab12jhs92jsljdue9whsuhd');
    $hash = $hasher->hash('foo');