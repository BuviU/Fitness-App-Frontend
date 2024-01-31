<?php

namespace Config;

class FirebaseAdmin
{
  public function GetConfig()
  {
    $FirebaseAdminConfig =  [
      "type" => "service_account",
      "project_id" => "get-fit-d0d5f",
      "private_key_id" => "ad1e66d9ffe954a00228dba3fa35ec7c81aadd10",
      "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC40ueIPLUw3fvP\n7Kx+g7u8N79zdHq5j2U1UZmMwRizkt21VTJSzNOEmAyhJLjn9O+fuX8EKY9KCQIS\nDFPyPSKmOhth/ItuzR8GOJTUaD7FTPja2bwkSZiJRbibrg8BlVpXih3w0KIybJ4l\n+Hs/Ec8kBqXEa70vV7fTO1vUYwVLWGdcj3QUbRh9wYdAIDkj3yiVqFddBBl6MNpM\nvXdjAMoT++8j+wzXkSV4uq1nEY1g8JqXobx+pc2rcl6NXKfLH91lnb+p5CdYrDn9\n+6zJtcEOLAZiZ0LRiCnjFxWa6VZ0ti5zNGlQpdjmHFKhBS79M8cb56CwM9TEygl3\nHIGr52yfAgMBAAECggEAAQSgY965vMgsP+v000mUeifwdQlaN7VzgESvzNevdCXF\n9N7ARTZ9n8haoXSbVCPEQiP6cCJueKDuEv1gZQAzNakyR2rltbmJhzY+k6DzX5DZ\n+hKi96w0G+V3a9wclwykj8DiA1aS3iY9BMaGn0VQ18j1lsxlIWKhT5ePHO9isxSK\nK8M2cmJy2PQTfjbA470HODO1O7xB+TVSQM0zrkaa9mnX2W1pFIaAtMfdIrBvW4a+\nVxMvKWWSy7A/66wBev0zsYZdRH/7M2su1LxW8b3BB7eZXs+DgSj1YMQQGpT+C/hQ\n9iERt6/7Xih9nVKnZUvAvZ+n4HPHap1y26cd6geveQKBgQDzv1GG3OIZqW2DGKlS\nDQPi5mKDBiDMFDCukvOcFIcYMLX98RjFKzChIsW4gZxqv6dyw84Wo0OLLfXvGQWR\nh2VI7eLl/P2TJC4jgWWTquzL30s8CaVRBAmvcD3s3PMjh447ZB4Lg2Yhh7d5eVzv\n3BqOzVZxkWY2smmVQzBf1xouzQKBgQDCHVMNafdUWbNvB2DYjsJ7aomZKpKqrLSs\ns8ru0uHFBXMkEKkwUTGMpPn64uzyb5MAPokFLdUBED8EbgKXVPk1ovJPfTY3BiBN\n232BToLqNjt/mKmcOl+ajjEvYEluhV0vBSM9WpTGKU8GrBOGycTOYLlAECfFgRk0\nTuM4a2xxGwKBgDqDwlmi6zCH6P9gyz0kXLt63UlhDjyP2EQAiTT+BJR9FSOaXnzu\n6mS0iUzK6LcDvXoioXXzycI+zVyR4DFYlKsWWLMnseRB+kWRycXScbhbqZ8HHcW+\nN2kDhAo53LC52R5O4ZuX9suz3gruZK48Y6/GgasP4b7dw9UOZS2M4P89AoGBAKs9\nX0TYFB3PO+FYavDfj2V8aII78kKqNICd4wmn8w7xbc+E+xvqpIFkEDpo8Yo1L0Lp\n58ov0lYr1Mu9mH+TsHzGkGfbF3aW6uyEEkV90zN2QCqhrA5r2GbpxS38DQt4jump\n6Jp5TAE788D5EAi5+entnb6MAenTpz5j0UK2UWW9AoGBAMiNBN1DQwwiFhp2Ke1q\n2+8R4bjkuMHqpvIwmAkBHeI0X9DOEN/PD/RmIROqa98CSFW6/qq2S9BazD70HWku\noj+LgLHC/jJvcAxE5UyqKS/xi+Y7uzlpE/gA/Bew2XgEq00lCk8zyAPTaKDfwp88\nubJh4Pv4Ey9bxsjp82lMH+x7\n-----END PRIVATE KEY-----\n",
      "client_email" => "firebase-adminsdk-mk8md@get-fit-d0d5f.iam.gserviceaccount.com",
      "client_id" => "104344094317199560183",
      "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
      "token_uri" => "https://oauth2.googleapis.com/token",
      "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
      "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-mk8md%40get-fit-d0d5f.iam.gserviceaccount.com",
      "universe_domain" => "googleapis.com"
    ];

    return json_encode($FirebaseAdminConfig);
  }
}
