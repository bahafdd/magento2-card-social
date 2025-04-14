# magento2-card-social

---


# Themestar_SocialCard

**Themestar_SocialCard** is a powerful Magento 2 module that automatically generates SEO-friendly social meta tags for **Twitter Cards**, **Open Graph** (Facebook, LinkedIn), and **Pinterest Rich Pins**.

This module enhances your store’s visibility and presentation on all major social media platforms by dynamically adding meta tags to your product, category, and CMS pages.

---

## Features

- **Twitter Cards** support: `summary`, `summary_large_image`
- **Open Graph tags** for **Facebook**, **LinkedIn**, and more
- **Pinterest Rich Pin** compatibility
- Dynamic data from Product, Category, and CMS pages
- Uses fallback images when no specific image is set
- Clean and extendable structure

---

## Compatibility

- Magento **2.4.0+** (Fully tested on 2.4.6)
- Supports Luma, Blank, and custom themes

---

## Installation

### Manual Installation

1. Copy the module to your Magento installation:

```bash
app/code/Themestar/SocialCard
```

2. Run the following Magento CLI commands:

```bash
bin/magento module:enable Themestar_SocialCard
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

---

## Configuration

Navigate to:

`Stores > Configuration > Themestar > Social Card`

You will find the following options:

- **Enable Module** – Toggle the entire feature on/off
- **Twitter Username** – Your brand's Twitter handle (e.g., `@brand`)
- **Twitter Author** – Author/creator Twitter handle
- **Default Card Type** – Choose between `summary` or `summary_large_image` or 'App' or 'Player'
- **Fallback Images** – Comma-separated image names stored in `pub/media/meta/`

These settings control how meta tags appear when specific images or content are not available on the current page.

---

## How It Works

- Pulls data from:
  - **Product Page**: Uses product image and description
  - **Category Page**: Uses category image
  - **CMS Page**: Uses fallback image
- Dynamically builds meta tags and injects into the page `<head>`
- No third-party dependencies

---

## Requirements

- Magento 2.4.x or above
- PHP 7.4+ / 8.x
- Enabled `Themestar_SocialCard` module
- Fallback images (optional) should be uploaded to `pub/media/socialcard/`

---

## License

MIT License (Feel free to modify or include in commercial projects)

---

## Need Help?

Open an issue or drop us a message at [magentoarabic.com](https://magentoarabic.com/support)

---

Make your store **social media ready** in one step with **Themestar_SocialCard**!

