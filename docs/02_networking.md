## Managing Data in Images & Containers
- [Main Page](https://github.com/alimranahmed/dockerlab/tree/main)

#### Types of Connection
1. Container to WWW(works by default without doing anything)
2. Container to host machine
3. Container to another container

#### Container to host machine
Need to use: `http://host.docker.internal:{port}`

This `host.docker.internal` is to access the host machine over network


#### Container to another container

**Option 1**

We can use `docker inspect {container-name}` 
where `container-name` is the name of the container we want to connect to.
From the output we can have `IPAddress` of that container, and
then using that IP Address we can connect/call this container from another container.

Here the problem is we need to **hardcoded** here!


**Option 2**

Create a network manually `docker network crate {shared-network-name}`

Create all the containers using same shared network as below:

`docker run --network {shared-network-name} ...`

Then we can use `http://{container-name}` to connect with the other docker container.

