# com.megaphonetech.softcreditcustomfields

This CiviCRM extension enhances soft credits in the following ways:
* It enables custom fields on soft credits, including a web interface for searching and editing those custom fields (see screenshot 1 below).
* It enables searching by soft creditee and soft credit type, even when searching for hard contributions. This makes it easy to search for everyone who gave in memory of a particular contact (see screenshot 2 below).

**Screenshot 1**
![Screenshot](/images/new-custom-field-set.png)

**Screenshot 2**
![Screenshot](/images/screenshot2.png)

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM 5.8+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.megaphonetech.softcreditcustomfields@https://github.com/MegaphoneJon/com.megaphonetech.softcreditcustomfields/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/MegaphoneJon/com.megaphonetech.softcreditcustomfields.git
cv en softcreditcustomfields
```

## Usage

Upon installation, go to **Customize Data & Screens >> Custom Fields** and click on the **Add Set of Custom Fields** button. Give this set a name and make sure to to select **Contribution Soft** next to *Used For*.

![Screenshot](/images/new-custom-field-set.png)

When you add or view a contribution, you will find your custom field set under *Soft Credit*.

![Screenshot](/images/contrib-w-custom-soft.png)

In addition, you can search by soft creditee and soft credit type, even when searching for hard contributions. Simply use **Find Contributions**, which is found under both **Contributions** and **Search**. This makes it easy to search for everyone who gave in memory of a particular contact (see screenshot 2 below).

![Screenshot](/images/screenshot2.png)


## Known Issues

None.
