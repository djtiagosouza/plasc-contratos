curl --request GET \
     --url https://app.clicksign.com/api/v3/folders \
     --header 'Authorization: 53797467-a4d1-4e76-8726-47b56815d53e' \
     --header 'Content-type: application/vnd.api+json' \
     --header 'accept: application/json'

	 curl --request GET \
     --url https://sanbox.clicksign.com/api/v3/folders \
     --header 'Authorization: 9180ce47-c7be-4714-8657-b46c550cd203' \
     --header 'Content-type: application/vnd.api+json' \
     --header 'accept: application/json'

https://sandbox.clicksign.com/api/v3/envelopes?access_token=9180ce47-c7be-4714-8657-b46c550cd203

	{"data": [
		{
			"id": "659109a3-7ebf-4aee-8f39-6988a689f16c",
			"type": "folders",
			"links": {
				"self": "https://app.clicksign.com/api/v3/folders/659109a3-7ebf-4aee-8f39-6988a689f16c"
			},
			"attributes": {
				"name": "Individual",
				"path": "",
				"in_root": true,
				"created": "2025-09-23T11:04:21.664-03:00",
				"modified": "2026-02-19T17:16:12.837-03:00"
			}
		}
	],
	"meta": {
		"record_count": 1
	},
	"links": {
		"first": "https://app.clicksign.com/api/v3/folders?page%5Bnumber%5D=1&page%5Bsize%5D=20",
		"last": "https://app.clicksign.com/api/v3/folders?page%5Bnumber%5D=1&page%5Bsize%5D=20"
	}
}



curl --request GET \
     --url https://app.clicksign.com/api/v3/folders/659109a3-7ebf-4aee-8f39-6988a689f16c \
     --header 'Authorization: 53797467-a4d1-4e76-8726-47b56815d53e' \
     --header 'Content-type: application/vnd.api+json' \
     --header 'accept: application/json'
     