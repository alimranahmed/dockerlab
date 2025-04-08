## Managing Data in Images & Containers
- [Main Page](https://github.com/alimranahmed/dockerlab/tree/main)

#### Types of data
1. Application(Code + Environment) - Stored in image
2. Temporary App Data(User data while container is running) - Stored in Containers
3. Permanent App Data(Files, Database. e.g. user account data) - Stored in Containers & Volumnes


#### Volumes
**Anonymous Volumes**
in `Dockerfile` add the line value to make sure the data inside the container will not be deleted

`VOLUME ["directory/of/container"]`

Here, we are **not saying to which path of host** it should be synced with. Docker handles it by itself.

This creates an anonymous volume and an anonymous volume is deleted when the container is removed.

**Named Volumes**
Cannot be created by `Dockerfile`, need to create while creating container from image. For example:

`docker run -p {host-port}:{container-port} --name {container-name} -v {volume-name}:{path-in-container} {image-name/id}`

Named volume will not be deleted when the container is deleted as these are not attached with one specific container.

Volumes are not meant to be access directly.

#### Bind Mounts
Cannot be done using `Dockerfile` as it doesn't affect the image but the container

`docker run -p {host-port}:{container-port} --name {container-name} -v {abs-dir-path-in-host}:{path-in-container} {image-name/id}`

here the directory of `abs-dir-path-in-host` will be synced with `path-in-container`

This can override pre-existing directory like `node_modules` or `vendor` that was generated as part of image script.

To solve this we can create another anonymous volume using command like `-v /app/node_modules`.


#### Overview
Anonymous Volume: `docker run -v /app/data` - removed if container is removed/deleted

Named Volume: `docker run -v valume-name:/app/data` - readonly, unknown storage location in host

Bind Mount: `docker run /path/to/code-in-host:/app/code-in-container` - editable, synced with host's directory


#### Manage Volume
List: `docker volume ls`

Create: `docker volume create {volume-name}`

Inspect: `docker volume inspect {volume-name}`

Delete: `docker volume rm {volume-name}` - containers that use this volume should be stopped.
