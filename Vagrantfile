# -*- mode: ruby -*-
# vi: set ft=ruby :

# ! NEED TO RUN: vagrant box update

# https://app.vagrantup.com/bento/boxes/ubuntu-16.04
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.5.10"
  config.vm.network "forwarded_port", guest: 22, host: 2052, host_ip: "127.0.0.1", id: "ssh"
  config.vm.synced_folder '.', '/vagrant', disabled: true
  config.vm.synced_folder "docker", "/external/docker", create: true, group: 'vagrant', owner: 'vagrant', mount_options: ["dmode=755,fmode=644"]
  config.vm.synced_folder "project", "/external/project", create: true, group: 'www-data', owner: 'www-data', mount_options: ["dmode=755,fmode=644"]

  config.vm.boot_timeout = 600

  # We are going to give VM 1/4 system memory & access to all cpu cores on the host
  config.vm.provider "virtualbox" do |vb|
    host = RbConfig::CONFIG['host_os']
    if host =~ /darwin/
      cpus = `sysctl -n hw.ncpu`.to_i
      mem = `sysctl -n hw.memsize`.to_i / 1024 / 1024 / 4
    elsif host =~ /linux/
      cpus = `nproc`.to_i
      mem = `grep 'MemTotal' /proc/meminfo | sed -e 's/MemTotal://' -e 's/ kB//'`.to_i / 1024 / 4
    else
      cpus = 2
      mem = 2048
    end
    vb.customize ["modifyvm", :id, "--memory", mem]
    vb.customize ["modifyvm", :id, "--cpus", cpus]
  end

  config.vm.provision "shell", inline: <<-SHELL
    # https://docs.docker.com/install/linux/docker-ce/ubuntu/#install-using-the-repository
    sudo DEBIAN_FRONTEND=noninteractive
    sudo apt-get update
    sudo apt-get upgrade -y
    sudo apt-get install -y mc
    sudo apt-get install -y apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
    sudo apt-get update
    sudo apt-get install -y docker-ce
    sudo apt-get autoremove -y
    sudo apt-get clean
    # https://docs.docker.com/compose/install/#install-compose
    # https://github.com/docker/compose/releases/
    sudo curl -L https://github.com/docker/compose/releases/download/1.20.1/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
    # https://docs.docker.com/install/linux/linux-postinstall/#manage-docker-as-a-non-root-user
    sudo groupadd docker
    sudo usermod -aG docker vagrant
    # Verify that you can run docker commands without sudo : $ docker run hello-world

    # https://docs.docker.com/machine/install-machine/ - Install Docker Machine
    base=https://github.com/docker/machine/releases/download/v0.14.0 && curl -L $base/docker-machine-$(uname -s)-$(uname -m) >/tmp/docker-machine && sudo install /tmp/docker-machine /usr/local/bin/docker-machine
    # Check the installation by displaying the Machine version: $ docker-machine version
  SHELL
end
