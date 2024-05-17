diskutil unmountDisk /dev/disk16
diskutil partitionDisk /dev/disk16 GPT JHFS+ Temp 100%
diskutil apfs createContainer /dev/disk16s2
diskutil apfs addVolume disk17 APFS MyAPFS
