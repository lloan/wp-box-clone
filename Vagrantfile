# -*- mode: ruby -*-
# vi: set ft=ruby :


require File.dirname(__FILE__)+"/dependency_manager"

check_plugins ["vagrant-hostsupdater", "vagrant-host-shell"]
 
Vagrant.configure("2") do |config|

    config.vm.box = "lloan/wp-box-clone"
    config.vm.box_version = "1.0.0" 
    config.vm.network "private_network", ip: "192.168.33.112"
    config.vm.network "forwarded_port", host_ip: "127.0.0.1", guest: 3306, host: 1122 
    config.vm.hostname = "local.lloan.com"
    config.hostsupdater.aliases = ["local.lloan.com"]

    config.vm.provider "virtualbox" do |v|
        v.memory = 4096
        v.cpus = 4
        v.name = "WPBOX"
    end

    config.vm.provision "file", source: "~/.ssh/id_rsa", destination: "/home/vagrant/.ssh/id_rsa"
    config.vm.provision "file", source: "~/.ssh/id_rsa.pub", destination: "/home/vagrant/.ssh/id_rsa.pub"
    config.vm.provision "file", source: "~/.ssh/known_hosts", destination: "/home/vagrant/.ssh/known_hosts"
 
    if Vagrant::Util::Platform.windows?
        ## FOR WINDOWS USERS ##
        config.vm.synced_folder ".", "/var/www", 
        :mount_options => ["dmode=777", "fmode=666"]       
    else
        ## FOR MAC USERS ##
        config.vm.synced_folder ".", "/var/www",
        id: "core",
        :nfs => true,
        :mount_options => ['nolock,vers=3,udp,noatime']
    end

    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.vm.provision "shell", path: "script.sh" 
 
    config.vm.provision :host_shell do |host_shell|
        host_shell.inline = 'start chrome "http://local.lloan.com"'
    end
end

