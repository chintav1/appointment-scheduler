Github Auto Pull
===============================================================================

This script is based on the post by [Jeffery Way](http://jeffrey-way.com/) on
Nettuts+,  [The Perfect Workflow, with Git, GitHub, and SSH](http://net.tutsplus.com/tutorials/other/the-perfect-workflow-with-git-github-and-ssh/).

Github Auto Pull aims to provide a secure way as possible of having your
project auto pull when you push a commit to Github.


Installing
-------------------------------------------------------------------------------

1. Copy the contents of `github-pull.php` into a file on your server, you can keep the original name but for increase security you should rename it.

2. Now enter the URL of your server including the path to the `github-pull.php` file (or what ever you called it) and append it with the querystring `?passgen=PASSWORD` (change PASSWORD to a random string). This will generate the salt and password for your file as well as give you the url for the service hook… which should be handy!

3. Copy the contents of the first text box and paste that into the file (should be lines 4 and 5)

4. Copy the contents of the second text box and go to `https://github.com/USERNAME/PROJECT/admin/hooks` (changing USERNAME and PROJECT accordinly) and click on "Post-Receive URLs" and paste the contents into one of the empty boxes. Click "Update Settings".

5. Change the permissions of the file to `754`. This will allow your server to run the commands.

6. That should be all ready to go and even if you publish the file with the keys, they might struggle sussing out the password thanks to the MD5 encoding and the somewhat secure crypt() file.


Options
-------------------------------------------------------------------------------

You can pass various options through the query string.

### Required

`update=...`
Pass phrase you set in install step 2


###Optional

`project=...`
Give the project a name in the emails; "[PROJECT] ..."

`from=...`
Email user the post-pull emails is sent from; USER@github.com

`email=...`
Who the post-pull email should go to, if empty then no email is sent


-------------------------------------------------------------------------------
Github Auto Pull by [Neil Sweeney](http://wolfiezero.com/) is licensed under a
[Creative Commons Attribution-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-sa/3.0/).
