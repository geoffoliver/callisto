Vagrant.configure(2) do |config|
	config.vm.box = "ubuntu/trusty64"
	config.vm.network "private_network", ip: "192.168.33.10"
	config.vm.network "forwarded_port", guest: 80, host: 8080
	config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=766"]
	config.vm.provision "shell", path: "vagrant-provision/bootstrap.sh"
end
