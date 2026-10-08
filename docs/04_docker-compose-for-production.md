## Managing Data in Images & Containers
- [Main Page](https://github.com/alimranahmed/dockerlab/tree/main)


### Why having bind mount of configs in docker compose may not be enough
Configs like nginx.conf can be bind mounted in the docker compose. 
But this bind mount docker compose is not part of the image. 
Thus, if someone has the image, won't have the nginx.config.

So, to make the docker image production ready we need to copy the nginx.config to container in the dockerfile.
docker compose should still have the bind mount to keep the codebase development friendly. So, if someone change
the config during development, the config will be synced automatically with the container.
