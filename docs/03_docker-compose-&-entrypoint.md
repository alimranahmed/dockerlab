## Managing Data in Images & Containers
- [Main Page](https://github.com/alimranahmed/dockerlab/tree/main)

#### What is docker compose?
An alternative to writing long `docker run ...` and remembering that command.
Not an alternative to `Dockerfile`

#### What can be done using docker compose?
We can do almost everything we do using long command `docker run ...`
For example 
1. Which image to build from which dockerfile
2. Defining volumes
3. Defining networks

BUT detach(`-d`) doesn't have an equivalent script in docker compose.

However, while running `docker compose up` we can pass `-d`.

Also remove container(`--rm`) doesn't have an equivalent script in docker compose.

We can run `docker compose down` to stop all the containers.



#### Entrypoint
Entry point of Dockerfile will append the command that will be 
executed while running the utility container

For example, if we define an entrypoint `npm` in `Dockerfile` like:
```yaml
ENTRYPOINT ["npm"]
```

Then any command after docker run using --it will be pass to `npm`

`docker build  -t mynpm .`

Then

`docker run -it --rm -v {project-absolute-path-in-host}:/app mynpm init`

This will execute `npm init` in the container and remove(`--rm`) the container. 

This container will act like **utility container**. 
This can be useful for doing some operation in the project(e.g. `composer install`). 
Once that operation is done and output is shared via volume, that container is removed.   



