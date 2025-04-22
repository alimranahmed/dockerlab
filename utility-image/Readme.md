This is a utility image

For example, we can run `npm install` or `npm init` in our project without installing npm in our host machine. 

Let's say we can create the image as below:

`docker build  -t mynpm .`

Then 
`docker run -it --rm -v {project-absolute-path-in-host}:/app mynpm init`

Here `init` is an `npm` command, as the dockerfile has an ENTRYPOINT `npm`
So, any command we run using this docker run that command will be appended after `npm`

We can also use `docker-compose.yml` file to trim down the command to use the entrypoint

`docker compose run {service-name} init`

In this command the docker is not removed. To remove it:

`docker compose run --rm {service-name} init`