# Perch CollectionList fieldtype

A fieldtype for Perch Runway CMS to select an item from a collection. Perch Runway only. Similar to [Dataselect](https://docs.grabaperch.com/templates/field-types/dataselect/), but for Perch Runway Collections rather than Perch regions.

## Installation

Copy the `collectionlist` folder to `perch/addons/fieldtypes`.

General documentation on Perch fieldtypes can be found on the [Perch support site](https://docs.grabaperch.com/templates/field-types/).

## Attributes
- collection: Required. The name of the collection.
- options: Required. The ID of a field in the collection to populate the select box with.
- values: Optional. The ID of another field in the collection to take the values from. If omitted, the internal itemID is used.

## Examples
`<perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" />`
`<perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" values="isbn" />`