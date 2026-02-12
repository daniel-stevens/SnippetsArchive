# macOS Disk Formatting & APFS Guide

## List All Disks

```bash
diskutil list
```

Shows all disks, partitions, and their identifiers (e.g., `disk0`, `disk2s1`). Always run this first to identify the correct disk.

## Format a Disk to APFS (Full Process)

### Step 1: Unmount the disk

```bash
diskutil unmountDisk /dev/disk16
```

Unmounts all volumes on the disk so it can be reformatted. Replace `disk16` with your actual disk identifier from `diskutil list`.

### Step 2: Partition with a temporary HFS+ format

```bash
diskutil partitionDisk /dev/disk16 GPT JHFS+ Temp 100%
```

| Part | Meaning |
|---|---|
| `GPT` | GUID Partition Table (required for modern macOS) |
| `JHFS+` | Journaled HFS+ (temporary, will be converted to APFS) |
| `Temp` | Volume name (temporary) |
| `100%` | Use entire disk |

### Step 3: Create an APFS container

```bash
diskutil apfs createContainer /dev/disk16s2
```

Converts the HFS+ partition into an APFS container. The `s2` refers to the partition (slice 2 -- the data partition after the EFI partition).

### Step 4: Add an APFS volume

```bash
diskutil apfs addVolume disk17 APFS MyAPFS
```

Creates a named APFS volume inside the container. Replace `disk17` with the container reference from the previous command's output, and `MyAPFS` with your desired volume name.

## Quick Format (One Command)

If you just want to erase and format a disk to APFS in one step:

```bash
diskutil eraseDisk APFS "MyDisk" GPT /dev/disk16
```

## Other Useful Commands

```bash
# Get detailed info about a disk
diskutil info /dev/disk16

# Erase a single volume (not the whole disk)
diskutil eraseVolume APFS "NewName" /dev/disk16s2

# Rename a volume
diskutil rename /dev/disk16s2 "NewName"

# Mount/unmount a single volume
diskutil mount /dev/disk16s2
diskutil unmount /dev/disk16s2

# Repair disk permissions / verify
diskutil verifyDisk /dev/disk16
diskutil repairDisk /dev/disk16

# List APFS containers specifically
diskutil apfs list
```

## Common Filesystem Types

| Type | When to Use |
|---|---|
| `APFS` | macOS 10.13+, SSDs, internal drives (default) |
| `JHFS+` | Older macOS, HDDs, Time Machine (legacy) |
| `ExFAT` | Cross-platform USB drives (macOS + Windows) |
| `FAT32` | Maximum compatibility (4GB file size limit) |

## Warning

Always double-check the disk identifier with `diskutil list` before formatting. Formatting the wrong disk will destroy all data on it. There is no undo.
