pipeline {
    agent {
        docker {
            image 'php:7.4'
        }
    }
    tools {
        phpInstallation('PHP') {
            name = 'PHP'
            home = '/usr/local/bin'
            version = '7.4'
        }
    }
    stages {
        stage('Build') {
            steps {
                sh 'composer install'
            }
        }
        stage('Test') {
            steps {
                sh 'vendor/bin/phpunit'
            }
        }
        stage('Deploy') {
            steps {
                sh 'npm run deploy'
            }
        }
    }
}
