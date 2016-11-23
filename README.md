# example-rest-server

This is a very simple REST server, one distributed component of
a simple webapp, to assist with travel planning
amongst the Southern Gulf Islands. The data supplied is old, so don't
rely on it for a current trip!

This is the server, so it contains the actual data, and then a REST
controller that the client-side of the app would call.

A model of the schedule is provided as an XML document, and encapsulated
with a CodeIgniter model. This webapp will be teased apart, so that the
schedule is managed "remotely", making way for potential multiple
clients to provide planning or booking front-end apps.

This webapp is built on top of the CI3 starter3, and adds or changes the
following:

/application
    /config
        rest.php ... package
    /controllers
        Ports.php
        Sailings.php
        Welcome.php
    /libraries
        Curl.php ... package
        Format.php ... package
        Rest.php ... package
        REST_Controller.php ... package
    /models
        Ferryschedule.php
/data
    ferryschedule.dtd
    ferryschedule.xml

This incorporates an older version of Phil Sturgeon's REST server,
which has now been superceded by the https://github.com/chriskacerguis/codeigniter-restserver package.
Incorporating that will be the next iteration of this example.


WORK-IN-PROGRESS