#!groovy

pipeline {
    agent any
    def nameJob = "testPipeline"
    stages {
        stage('Build') {
          steps {
            sh 'rm -rf *'
            sh 'rm -rf .git'
            checkout scm
            sh ('git branch test')
            sh('git branch -av')


            def authorName = sh(script: "git show -s --pretty=%an", returnStdout: true).trim()
            def authorEmail = sh(script: "git show -s --pretty=%ae", returnStdout: true).trim()
          }
        }
    }
    post {
        always {
            echo 'This will always run'
        }
        success {
            echo 'This will run only if successful'
        }
        failure {
            echo 'This will run only if failed'
        }
        unstable {
            echo 'This will run only if the run was marked as unstable'
        }
        changed {
            echo 'This will run only if the state of the Pipeline has changed'
            echo 'For example, if the Pipeline was previously failing but is now successful'
        }
    }
}
