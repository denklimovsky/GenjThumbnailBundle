## Updating the project to use S3

This are the steps necessary to implement the S3 structure

### parameters.yml(.dist)

Add the following paramters:

```
    # Resolver options:
    # 'default' -> use the local filesystem
    # 'amazon_s3' -> use the S3 bucket, this makes the extra configuration required
    genj_thumbnail.cache.resolver: 'default'
    genj_thumbnail.amazon.s3.key:
    genj_thumbnail.amazon.s3.secret:
    genj_thumbnail.amazon.s3.bucket:
    genj_thumbnail.amazon.s3.region:
```

### thumbnails.yml

Add the following configuration:

```
    liip_imagine:
        ....
        cache: %genj_thumbnail.cache.resolver%
        ....
        ....
        resolvers:
            amazon_s3:
                aws_s3:
                    client_config:
                        key:     %genj_thumbnail.amazon.s3.key%
                        secret:  %genj_thumbnail.amazon.s3.secret%
                        region:  %genj_thumbnail.amazon.s3.region%
                        version: 'latest'
                    bucket:     %genj_thumbnail.amazon.s3.bucket%
                    get_options:
                        Scheme: 'https'
                    put_options:
                        CacheControl: 'max-age=86400'
```