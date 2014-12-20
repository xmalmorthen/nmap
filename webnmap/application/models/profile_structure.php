<?php

/*$profile = array(
    'Intense scan' => '-T4 -A -v',
    'Intense scan plus UDP' => '-sS -sU -T4 -A -v',
    'Intense scan, all TCP ports' => '-p 1-65535 -T4 -A -v',
    'Intense scan, no ping' => '-T4 -A -v -Pn',
    'Ping scan' => '-sn',
    'Quick scan' => '-T4 -F',
    'Quick scan plus' => '-sV -T4 -O -F --version-light',
    'Quick traceroute' => '-sn --traceroute',
    'Regular scan' => '',
    'Slow comprehensive scan' => '-sS -sU -T4 -A -v -PE -PP -PS80,443 -PA3389 -PU40125 -PY -g 53 --script "default or (discovery and safe)"'
);*/

$profile = array(
    '-T4 -A -v', //Intense scan 
    '-sS -sU -T4 -A -v', //Intense scan plus UDP
    '-p 1-65535 -T4 -A -v', //Intense scan, all TCP ports
    '-T4 -A -v -Pn', //Intense scan, no ping
    '-sn', //Ping scan
    '-T4 -F', //Quick scan
    '-sV -T4 -O -F --version-light', //Quick scan plus
    '-sn --traceroute', //Quick traceroute
    '', //Regular scan
    '-sS -sU -T4 -A -v -PE -PP -PS80,443 -PA3389 -PU40125 -PY -g 53 --script "default or (discovery and safe)"' //Slow comprehensive scan
);