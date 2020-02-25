 # Flymon

A WordPress plugin to display the lowest flight price for a given route/dates in your blog.
Uses the backend https://github.com/wetterkrank/travelcheck (a Python + Mongo caching layer over the supplier's API).

## Installation

Copy the plugin into the plugins directory; activate.

## Usage

To display the price in your post or page, insert the shortcode fpm_price in the text.
Shortcode parameters and examples:

- type (micro, mini, full)
- from (BER, berlin_de)
- to (MUC, innsbruck_at)
- earliest (2018-01-30, tomorrow)
- latest (2018-12-31, +3 months)
- min_days (2)
- max_days (4)
- direct_only (true, false)
- currency (EUR)
- locale (en)

Examples:
[fpm_price from="BER" to="MUC" earliest="tomorrow" latest="+3 months" currency="EUR"]

## License

This plugin is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

A copy of the license is included in the root of the plugin’s directory. The file is named `LICENSE`.
