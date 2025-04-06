## Docker Lab

#### Dockerfile
- `RUN` to execute a command while building the image
- `EXPOSE {port number}` to publish a port from the docker container
- `CMD ["{cmd-part1}", "{cmd-part2}"]` to execute a command while a container is created from that image,
  `CMD` takes an array of string that separate the command by space. It should be the lass line of the Dockerfile

#### Building container from image
`docker build -t {name}:{tag} .`

`.` is to take the `Dockerfile` from the current directory.

`-t {name}:{tag}` to give a name and tag to the image we are building

#### Creating containers of image
`docker run -p {host-port}:{container-port} {image-id/name}`

`-it` can be passed to open interactive tty mode

`-d` to create container in detached mode

`-a` for attach mode, and this is the **DEFAULT** mode

`--rm` to remove/delete the container whenever stopped

`--name` to set the name of the container

#### Manage Images
List `docker images`

Remove unused image `docker rmi {image-id/name}`

Remove all unused images: `docker image prune -a`

See the structure of image: `docker image inspect {image-id/name}`

Create new name/tag from existing tag: `docker tag {old-name}:{old-tag} {new-name}:{new-tag}`

Pull the latest version of image: `docker pull {img-vendor}/{img-name}:{tag}`

#### Manage Containers
List: `docker ps`

`ps` = processes, `-a` flag for all(even stopped one)

Start: `docker start {container-id/name}`

Stop: `docker stop {container-id/name}`

See logs: `docker logs {container-id/name}` `-f` can be passed to follow the logs

Remove stopped container: `docker rm {container-id/name}`

Copy file/directory: `docker cp {source-path} {container-id/name}:{destination-path}`


