#!groovy

nameJob = "testPipeline"
pipeline{

stages{
  // -------------------------------
  // ----- STAGE: 'Build'
  // -------------------------------
  stage ('Build'){
steps {
    echo '---------------------------------------'
    echo '             Build'
    echo '---------------------------------------'
    sh 'rm -rf *'
    sh 'rm -rf .git'
    checkout scm
    sh ('git branch test')
    sh('git branch -av')


    authorName = sh(script: "git show -s --pretty=%an", returnStdout: true).trim()
    authorEmail = sh(script: "git show -s --pretty=%ae", returnStdout: true).trim()
}
  }

  // -------------------------------
  // ----- STAGE: 'Unit Test'
  // -------------------------------
  stage ('Unit Test'){
    steps {
    echo '---------------------------------------'
    echo '             Unit Test'
    echo '---------------------------------------'

    sh('composer update')
},

        steps {
                sh('phpunit tests')
                 }
                 post {
                   failure {
                     mail to:"${authorEmail}", subject:"ERROR: ${currentBuild.fullDisplayName}",
                     body: """Opps,  Error .
                      Build: ${currentBuild.fullDisplayName}
                      Branch: ${BRANCH_NAME}

                      Check me: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/
                     """
                   }
                 }



  }

  // -------------------------------
  // ----- STAGE: 'Deploy'
  // -------------------------------
  stage ('Push to Branch Test'){
    steps {
    echo '---------------------------------------'
    echo '            Push to Branch Test'
    echo '---------------------------------------'



    git branch: '${BRANCH_NAME}', credentialsId: 'test-identity', url: 'https://github.com/Didweb/pruebas.git'


    sh ('git branch -av')
    sh ('git checkout  test')
    sh ('git merge  ${BRANCH_NAME}')
    sh ('git branch -av')

    withCredentials([usernamePassword(
      credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a',
      usernameVariable: 'USERNAME',
      passwordVariable: 'PASSWORD')]) {

      sh ('git push https://${USERNAME}:${PASSWORD}@github.com/Didweb/pruebas.git test')
    }


  }
}
}

} // pipeline
